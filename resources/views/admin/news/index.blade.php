@extends('admin.layout.master')                

@section('main_content')

  <!-- START MAIN -->
  <div id="main">
      <!-- START WRAPPER -->
      <div class="wrapper">         

          <!-- //////////////////////////////////////////////////////////////////////////// -->

          <!-- START CONTENT -->
          <section id="content">

              <!--start container-->
              <div class="container">

                  <!--card widgets start-->
                  <div id="card-widgets">
                    <div class="row" style="display: none;">
                      <!-- map-card -->
                      <div class="col s12 m12 l4">
                          <div class="map-card">
                              <div class="card">
                                  <div class="card-image waves-effect waves-block waves-light">
                                      <div id="map-canvas" data-lat="40.747688" data-lng="-74.004142"></div>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>  

                <div class="container">
                  <div class="row">
                    <div class="col s12 m12 12">
                      <h5 class="breadcrumbs-title">{{$page_title}}</h5>
                      <ol class="breadcrumbs">
                        <li><a href="{{url('/admin/dashboard')}}">Dashboard</a>
                        </li>
                        <li><a href="#">Add {{$page_title}}</a>
                        </li>
                      </ol>
                    </div>
                  </div>
                </div>

                <?php
                  $user_status = Sentinel::check();
                ?>

            <div id="basic-form" class="section">
              <div class="row">
                <div class="col s12 m12">
                  @include('admin.layout._operation_status')
                  <div class="card-panel">
                    <div class="row">
                      <form class="col s12" method="post" action="{{url('/')}}/news_update" data-parsley-validate="" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col s12 m12">
                            <img id="blah" src="{{url('/')}}/images/no_image_available.png" style="border: 1px solid #ddd" alt="your image" height="150px" width="150px" />
                            <div class="file-field input-field">
                              <div class="btn">
                                <span>File</span>
                                <input id="file" name="file" type="file" onchange="readURL(this);" data-parsley-required="true" data-parsley-errors-container="#file_error">
                              </div>
                              <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                              </div>
                              <span id="file_error" class="parsley-required"></span>
                            </div>
                        </div>                      
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="title" name="title" type="text" data-parsley-required="true">
                            <label for="title">Title</label>
                            <span id="title_error" class="parsley-required"></span>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="city" name="city" type="text" data-parsley-required="true">
                            <label for="title">City</label>
                            <span id="city_error" class="parsley-required"></span>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="date" name="date" type="date" class="datepicker" data-parsley-required="true">
                            <label for="date">Event Date</label>
                            <span id="date_error" class="parsley-required"></span>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <textarea id="description" name="description" class="materialize-textarea" data-parsley-required="true"></textarea>
                            <label for="description" class="">Description</label>
                            <span id="description_error" class="parsley-required"></span>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input type="submit" class="btn cyan waves-effect waves-light right" id="submit" name="submit">
                          </div>
                        </div>
                      </form>
                     
                    </div>
                  </div>
                </div>
              </div>
            </div>
          
            <!--end container-->
          </section>
          <!-- END CONTENT -->

      </div>
      <!-- END WRAPPER -->

  </div>
  <!-- END MAIN -->
 <script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    function sponcer_name()
    {
       var id = $('#spencer_id').val();
       $.ajax({
              url: "{{url('/admin/get_sponcer_name')}}",
              type: 'POST',
              data: {
                _method: 'POST',
                id     : id,
                _token:  '{{ csrf_token() }}'
              },
            success: function(response)
            {
                $('#spencer_name').val(response);
            }
            });
    }
    function user_exist()
    {
       var id = $('#user_id').val();
       $.ajax({
              url: "{{url('/admin/user_exist')}}",
              type: 'POST',
              data: {
                _method: 'POST',
                id     : id,
                _token:  '{{ csrf_token() }}'
              },
            success: function(response)
            {
              if(response == '1')
              {
                $('#user_id_error').text('User id already exist.');
              }
              else if(response == '2')
              {
                $('#user_id_error').text('');
              }
              else
              {
                $('#user_id_error').text('');
              }
            }
            });
    }
    function get_state()
    {
       var id = $('#country').val();
       $.ajax({
              url : "{{url('/admin/get_state')}}",
              type: 'POST',
              data: {
                _method: 'POST',
                id     : id,
                _token : '{{ csrf_token() }}'
              },
            success: function(response)
            {
              $('#div_state').html(response);
            }
            });
    }
    function get_city()
    {
       var id = $('#state').val();
       $.ajax({
              url: "{{url('/admin/get_city')}}",
              type: 'POST',
              data: {
                _method: 'POST',
                id     : id,
                _token:  '{{ csrf_token() }}'
              },
            success: function(response)
            {
                $('#city').html(response);
            }
            });
    }
  </script>
@stop 