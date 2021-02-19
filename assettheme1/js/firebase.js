var config = {
      apiKey: "AIzaSyC7dder3L31LS4eAKK5tJafC3kG5SQFgOc",
      authDomain: "azukation-d6b18.firebaseapp.com",
      databaseURL: "https://azukation-d6b18.firebaseio.com",
      projectId: "azukation-d6b18",
      storageBucket: "azukation-d6b18.appspot.com",
      messagingSenderId: "714319155538"
    };
    firebase.initializeApp(config);
    const messaging=firebase.messaging();
    messaging.usePublicVapidKey("BIK-2nGQpeA8J1j8O6czsR5c9pfVqk2VvapB97iW_JwgEtO-Dvdxz52Dlm5hASiVUVeiwTnYIG5zrJZh-Z71HgM");
    //check if token belongs to previous user
    function isPreviousUser(){
      messaging.getToken().then(function(currentToken) {
          axios.post('/device/check/', {
            authkey: currentToken,
          })
          .then(function (response) {
            var data=response.data;
            console.log(response);
            if(data.success){
                 if(!response.data.data.isPreviousUser){
                   setTokenSentToServer()
                 }
            }else{
                  console.log(data.error);
            }
          })
          .catch(function (error) {
            console.log(error);
            
          });
      }).catch(function(err) {
        console.log('Unable to retrieve refreshed token ', err);
      });
    }
    //end
    //send new token to server
    function setTokenSentToServer(sent) {
        if(sent){
          console.log("sent token",sent);
          axios.post('/device/web/', {
            authkey: sent,
          }).then(function (response) {
            var data=response.data;
            if(data.success){
              var successdata=data.data;
              window.localStorage.sentToServer='1';
            }else{
              console.log(data.error);
            }
        }).catch(function (error) {
          console.log(error);
        });
      }
    }
    //end
    // fcm events 
    messaging.requestPermission().then(function(){
          console.log("sucess");
          if(!isTokenSentToServer()){
            regToken();
          }else{
            isPreviousUser();
          }
          axios.get('/notification/unread/')
          .then(function(response){
            document.getElementById('notification_count').innerHTML=response.data.data.unread;
          }).catch(function(error){
              console.log(error);
          });
    }).catch(function(err){
          console.log(err);
    });
  
    messaging.onTokenRefresh(function() {
      messaging.getToken().then(function(refreshedToken) {
        console.log('Token refreshed.');
        setTokenSentToServer(refreshedToken);
      }).catch(function(err) {
        console.log('Unable to retrieve refreshed token ', err);
      });
    });
  
  
    messaging.onMessage(function(payload) {
      console.log( "payload:",payload);
      console.log("marker",document.getElementById('notification_count').innerHTML);
      var count= parseInt( document.getElementById('notification_count').innerHTML);
      document.getElementById('notification_count').innerHTML=count+1;
      
    });
    //end fc events
  
    //register new token
    function regToken(){
        messaging.getToken().then(function(currentToken) {
          if (currentToken) {
             setTokenSentToServer(currentToken);
          } else {
                console.log('No Instance ID token available. Request permission to generate one.');
                setTokenSentToServer(false);
          }
        }).catch(function(err) {
          console.log('An error occurred while retrieving token. ', err);
          setTokenSentToServer(false);
        });      
    }
    //end
  
     
    //check for token set
    function isTokenSentToServer() {
         console.log(window.localStorage.getItem('sentToServer'));
            return window.localStorage.sentToServer === '1';
    }
    //end
  
    