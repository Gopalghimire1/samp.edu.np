<?php
$district = [
  "Bhojpur",
  "Dhankuta",
  "Ilam",
  "Jhapa",
  "Khotang",
  "Morang",
  "Okhaldhunga",
  "Panchthar",
  "Sankhuwasabha",
  "Solukhumbu",
  "Sunsari",
  "Taplejung",
  "Tehrathum",
  "Udayapur",
  "Bara",
  "Dhanusa",
  "Mahottari",
  "Parsa",
  "Rautahat",
  "Saptari",
  "Sarlahi",
  "Siraha",
  "Bhaktapur",
  "Chitwan",
  "Dhading",
  "Dolakha",
  "Kathmandu",
  "Kavrepalanchowk",
  "Lalitpur",
  "Makwanpur",
  "Nuwakot",
  "Ramechhap",
  "Rasuwa",
  "Sindhuli",
  "Sindhupalchok",
  "Baglung",
  "Gorkha",
  "Kaski",
  "Lamjung",
  "Manang",
  "Mustang",
  "Myagdi",
  "Nawalpur",
  "Parbat",
  "Syangja",
  "Tanahu",
  "Arghakhanchi",
  "Banke",
  "Bardiya",
  "Dang",
  "Eastern Rukum",
  "Gulmi",
  "Kapilvastu",
  "Palpa",
  "Parasi",
  "Pyuthan",
  "Rolpa",
  "Rupandehi",
  "Dailekh",
  "Dolpa",
  "Humla",
  "Jajarkot",
  "Jumla",
  "Kalikot",
  "Mugu",
  "Salyan",
  "Surkhet",
  "Western Rukum",
  "Achham",
  "Baitadi",
  "Bajhang",
  "Bajura",
  "Dadeldhura",
  "Darchula",
  "Doti",
  "Kailali",
  "Kanchanpur",
];
sort($district);
?>
<!DOCTYPE html>
<html>

<head>
  
  <script type="text/javascript" src='/asset/js/nepinfo.js' referrerpolicy="origin"></script>
  <link rel="stylesheet" href="/asset/css/nepinfo.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
</head>

<body>
  <!--Make sure the form has the autocomplete function switched off:-->
  <form autocomplete="off" action="/action_page.php">
    <select name="district" id="district" style="width:300px;" required>
      <option></option>
      <?php foreach ($district as $key => $value) { ?>
        <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
      <?php } ?>

    </select>
    <select name="mun" id="mun" style="width:300px;" required>
      <option></option>

    </select>
    <input type="submit" value="submit">

  </form>

  <script>
    $(document).ready(function() {
      $('#district').select2({
        placeholder: "Select a District",
        allowClear: true
      });
      $('#mun').select2({
        placeholder: "Select a Municipality",
        allowClear: true
      });

      $('#district').change(function(e) {
        data = $(this).val();
        if (data != "") {
          bodies=localBodies[data];
          $("#mun").html("");
          str="<option></option>";
          bodies.forEach(element => {
          str+="<option value='"+element+"'>"+element+"</option>";
            
          });
          $("#mun").html(str);

        }
      });
    });
  </script>
</body>

</html>