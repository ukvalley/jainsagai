 <!-- START LEFT SIDEBAR NAV-->
          <aside id="left-sidebar-nav">
              <ul id="slide-out" class="side-nav fixed leftside-navigation">
              <li class="user-details cyan darken-2">
              <div class="row">
                  <div class="col col s4 m4 l4">
                      <img src="{{url('/')}}/images/user.png" alt="" class="circle responsive-img valign profile-image">
                  </div>
                  <div class="col col s8 m8 l8">
                      <ul id="profile-dropdown" class="dropdown-content">
                          </li>
                          <li><a href="#"><i class="mdi-communication-live-help"></i> Help</a>
                          </li>
                          <li class="divider"></li>
                          <li><a href="{{url('/')}}/admin/logout"><i class="fa fa-close"></i> Logout</a>
                          </li>
                      </ul>
                      <?php $user = Sentinel::getUser();?>
                      <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">{{$user->user_name or "Admin"}}<i class="mdi-navigation-arrow-drop-down right"></i></a>
                     
                  </div>
              </div>
              </li>
              <li class="bold active"><a href="{{url('/')}}/admin/dashboard" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>
              </li>
              <li class="no-padding">
                  <ul class="collapsible collapsible-accordion">
                    <!--<li class="bold">
                        <a class="collapsible-header waves-effect waves-cyan"><i class="fa fa-child"></i>Activities</a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                  <a href="{{url('/')}}/admin/activities">Add Attraction</a>
                                </li>
                                <li>
                                  <a href="{{url('/')}}/admin/manage_activities">Manage Activities</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-cyan"><i class="fa fa-tripadvisor"></i>Attractions</a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                  <a href="{{url('/')}}/admin/attractions">Add Attraction</a>
                                </li>
                                <li>
                                  <a href="{{url('/')}}/admin/manage_attractions">Manage Attractions</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-cyan"><i class="mdi-editor-insert-invitation"></i>Bookings</a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                  <a href="{{url('/')}}/admin/booking">Add Bookings</a>
                                </li>
                                <li>
                                  <a href="{{url('/')}}/admin/manage_booking">Manage Bookings</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-cyan"><i class="fa fa-image"></i>Children Gallery</a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                  <a href="{{url('/')}}/admin/children_gallery">Add Image</a>
                                </li>
                                <li>
                                  <a href="{{url('/')}}/admin/manage_children_gallery">Manage Gallery</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-redeem"></i>Promo Code</a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                  <a href="{{url('/')}}/admin/code">Add Promo Code</a>
                                </li>
                                <li>
                                  <a href="{{url('/')}}/admin/manage_code">Manage Promo Code</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-perm-media"></i>Gallery</a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                  <a href="{{url('/')}}/admin/gallery">Add Image</a>
                                </li>
                                <li>
                                  <a href="{{url('/')}}/admin/manage_gallery">Manage Gallery</a>
                                </li>
                            </ul>
                        </div>
                    </li>-->
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-cyan"><i class="fa fa-newspaper-o"></i>News</a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                  <a href="{{url('/')}}/add_news">Add News</a>
                                </li>
                                <li>
                                  <a href="{{url('/')}}/manage_news">Manage News</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                     <li class="bold">
                        <a class="collapsible-header waves-effect waves-cyan"><i class="fa fa-newspaper-o"></i>Event</a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                  <a href="{{url('/')}}/add_event">Add Event</a>
                                </li>
                                <li>
                                  <a href="{{url('/')}}/manage_event">Manage Event</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-cyan"><i class="fa fa-user"></i>User</a>
                        <div class="collapsible-body">
                            <ul>
                                <!--<li>
                                  <a href="{{url('/')}}/add_event"> Event</a>
                                </li>-->
                                <li>
                                  <a href="{{url('/')}}/manage_user">Manage User</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!--<li class="bold">
                        <a class="collapsible-header waves-effect waves-cyan"><i class="mdi-maps-store-mall-directory"></i>Rooms</a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                  <a href="{{url('/')}}/admin/room">Add room</a>
                                </li>
                                <li>
                                  <a href="{{url('/')}}/admin/manage_rooms">Manage Rooms</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold"><a href="{{url('/')}}/admin/notification" class="waves-effect waves-cyan"><i class="fa fa-bell"></i> Notification</a></li>
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-cyan"><i class="fa fa-cog"></i>Setting</a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                  <a href="{{url('/')}}/admin/change_password">Change Passowrd</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold">
                        <a class="collapsible-header waves-effect waves-cyan"><i class="fa fa-quote-left"></i>Testimonial</a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                  <a href="{{url('/')}}/admin/testimonial">Add Testimonial</a>
                                </li>
                                <li>
                                  <a href="{{url('/')}}/admin/manage_testimonial">Manage Testimonial</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold"><a href="{{url('/')}}/admin/manage_transaction" class="waves-effect waves-cyan"><i class="mdi-editor-attach-money"></i>Transaction</a></li>
                    <li class="bold"><a href="{{url('/')}}/admin/manage_user" class="waves-effect waves-cyan"><i class="mdi-social-people"></i> Users</a></li>
                    <li class="bold"><a href="{{url('/')}}/admin/manage_contact" class="waves-effect waves-cyan"><i class="mdi-notification-phone-forwarded"></i>Contact Us</a></li>
                   --> <li class="bold"><a href="{{url('/')}}/logout" class="waves-effect waves-cyan"><i class="fa fa-close"></i> Logout</a></li>
                  </ul>
              </li>
          </ul>
              <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
          </aside>
          <!-- END LEFT SIDEBAR NAV-->