
<?php $__env->startSection('title', 'Panel'); ?>
<?php $__env->startSection('content'); ?>
    <style>
        .shadow {
            -webkit-box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.75);
            box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.75);

            border-radius: 10px 10px 10px 10px;
            -moz-border-radius: 10px 10px 10px 10px;
            -webkit-border-radius: 10px 10px 10px 10px;
            border: 0px solid #a89a9a;
        }

    </style>
    <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="images/bg/bg1.jpg">
        <div class="container pt-120 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text-white font-36">Student Panel</h2>
                        <ol class="breadcrumb text-left mt-10 white">
                            <li><a href="/">Home</a></li>
                            <li class="active">Pages</li>
                            <li class="active">Panel</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="container">

        <div class="row" style="margin-top:3rem; margin-bottom:3rem;">
            <div class="col-md-3" style="padding:5px;">
                <?php echo $__env->make('studentpanel.menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div class="col-md-8">
                <div>
            <?php echo $__env->make('studentpanel.alert', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <br>
                <div>
                    <a href="/student/academics/" class="btn btn-success">Academic Records</a>

                <?php if(\Models\Studentacademic::where('student_id', $student->id)->count() > 0): ?>

                        <a href="/student/uploads/" class="btn btn-primary">
                            Proceed to Upload Documents 
                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                        </a>
                <?php endif; ?>
                </div>
                <br>
                <div class="shadow" style="padding:1rem; margin-bottom:3rem;">

                    <div>
                        <h1 class="text-left">
                            Add Academic Record
                        </h1>
                        <hr>
                    </div>
                    <div class="" style="padding:1rem;margin-bottom: 2rem;">
                        <form action="/student/academic/add/" method="post">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group text-left">
                                        <label class="text-left">Title</label>
                                        <select name="title" id="title" class="form-control" required>
                                            <option value="SLC/SEE">
                                                SLC/SEE
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group text-left">
                                        <label class="text-left">School Name</label>
                                        <input type="text" name="org_name" id="org_name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group text-left">
                                        <label class="text-left">School Address</label>
                                        <input type="text" name="orf_address" id="orf_address" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group text-left">
                                        <label class="text-left">School Phone</label>
                                        <input type="text" name="org_phone" id="org_phone" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group text-left">
                                        <label class="text-left">School Type</label>
                                        <select type="text" name="org_type" id="org_type" class="form-control" required>
                                            <option value="Private">Private</option>
                                            <option value="Goverment">Goverment</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group text-left">
                                        <label class="text-left">Symbolno</label>
                                        <input type="text" name="symbolno" id="symbolno" class="form-control">

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group text-left">
                                        <label class="text-left">Passed Year</label>
                                        <input type="text" name="passedyear" id="passedyear" class="form-control">

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group text-left">
                                        <label class="text-left">Marks Type</label>
                                        <select type="text" name="type" id="type" class="form-control" required>
                                            <option value=""></option>
                                            <option value="1">Grade</option>
                                            <option value="0">Percentage</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="per" style="display: none;">
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group text-left">
                                            <label class="text-left">Total Marks</label>
                                            <input type="number" step="0.01" name="marks" id="marks" class="form-control per" disabled
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group text-left">
                                            <label class="text-left">Division</label>
                                            <input type="text" name="division" id="division" class="form-control per"
                                                disabled required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group text-left">
                                            <label class="text-left">Percentage</label>
                                            <input type="number" step="0.01" name="percentage" id="percentage" class="form-control per"
                                                disabled required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="grade" style="display: none;">
                                <hr>
                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="form-group text-left">
                                            <label class="text-left">english gpa</label>
                                            <input type="number" step="0.01" name="e_gpa" id="e_gpa" class="form-control grade" disabled
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group text-left">
                                            <label class="text-left">Math gpa</label>
                                            <input type="number" name="m_gpa" id="m_gpa" class="form-control grade" step="0.01" disabled
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group text-left">
                                            <label class="text-left">Science gpa</label>
                                            <input type="number" step="0.01" name="s_gpa" id="s_gpa" class="form-control grade" disabled
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group text-left">
                                            <label class="text-left">GPA</label>
                                            <input type="number" step="0.01" name="gpa" id="gpa" class="form-control grade" disabled
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <div class="form-group text-left">

                                    <input type="submit" value="Add Record" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table">
                    <tr>
                        <td>
                            Title
                        </td>
                        <td>
                            organization
                        </td>
                        <td>Passed Year</td>
                        <td>symbolno</td>
                        <td colspan="4">Academics</td>
                    </tr>
                    <?php echo $student->academicsRender(); ?>

                </table>
               



            </div>
        </div>
    </div>

    <?php echo $__env->make('studentpanel.edit', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('studentpanel.changepass', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $("#type").change(function() {
            type = $("#type").val();
            if (type == 1) {
                $('#grade').css('display', "block");
                $('#per').css('display', "none");
                $(".grade ").prop("disabled", false);
                $(".per").prop("disabled", true);
            } else if (type == 0) {
                $('#grade').css('display', "none");
                $('#per').css('display', "block");
                $(".grade").prop("disabled", true);
                $(".per").prop("disabled", false);
            } else {
                $('#grade').css('display', "none");
                $('#per').css('display', "none");
            }
        })

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>