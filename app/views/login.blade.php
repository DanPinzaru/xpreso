
@extends('layouts.frontend')

@section ('page_title')
    @parent
    &nbsp;login
@stop

@section ('page_css')
<link href="/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
@stop

@section('main_container')
<!-- BEGIN CONTENT -->
<div class="row margin-bottom-40">
    <!-- BEGIN CONTENT -->
    <div class="col-md-9 col-sm-9">
        <h1>Login</h1>
        <div class="content-form-page">
            <div class="row">
                @if (Session::has('alert'))
                    <div class="alert alert-danger">
                        <p>{{ Session::get('alert') }}
                    </div>
                @endif
                <div class="col-md-7 col-sm-7">
                    <form class="form-horizontal form-without-legend" role="form" method="POST" action="/login" name="loginForm">
                        <div class="form-group">
                            <label for="userName" class="col-lg-4 control-label">User Name <span class="require">*</span></label>
                            <?php echo($errors->first('userName')); ?>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="userName" name="userName" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="userPasswd" class="col-lg-4 control-label">Password <span class="require">*</span></label>
                            <?php echo($errors->first('userPasswd')); ?>
                            <div class="col-lg-8">
                                <input type="password" class="form-control" id="userPasswd" name="userPasswd" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                                <button type="submit" class="btn btn-primary" name="submit">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->
</div>
<!-- END SIDEBAR & CONTENT -->
@stop

@section ('page_js')
<script src="/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        Layout.init();
        Layout.initUniform();
    });
</script>
@stop