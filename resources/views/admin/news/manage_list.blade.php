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
                    <div class="col s12 m12 l12">
                      <h5 class="breadcrumbs-title">Manage {{$page_title}}</h5>
                      <ol class="breadcrumbs">
                        <li><a href="index.html">Dashboard</a>
                        </li>
                        <li><a href="#">{{$page_title}}</a></li>
                        <li><a href="#">Manage {{$page_title}}</a></li>
                      </ol>
                    </div>
                  </div>
                </div>

           <!--DataTables example-->
            <div id="table-datatables">
              <div class="row">
                <div class="col s12 m12 12">
                  @include('admin.layout._operation_status')
                  <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <!--<th>Desciption</th>-->
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                 
                    <tbody>
                        @foreach($data as $key=>$user)
                          <tr>
                              <td>
                                {{$key+1}}
                              </td>
                              <td>
                                {{$user['title']}}
                              </td>
                              <!--<td style="white-space: nowrap; width: 50px; overflow: hidden; text-overflow: "----"; ">
                                 
                                {{$user['description']}}
                              </td>-->
                              <td>
                                {{$user['date']}}
                              </td>
                              <td>
                                <a href="{{url('/')}}/edit_news/{{$user['id']}}"><i class="fa fa-edit"></i></a>
                                <a href="{{url('/')}}/view/{{$user['id']}}"><i class="fa fa-eye"></i></a>
                                <a href="{{url('/')}}/delete/{{$user['id']}}"><i class="fa fa-trash"></i></a>
                              </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div> 
            <br>
            <div class="divider"></div> 
          
            <!--end container-->
          </section>
          <!-- END CONTENT -->

      </div>
      <!-- END WRAPPER -->

  </div>
  <!-- END MAIN -->
   

@stop 