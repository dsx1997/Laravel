@extends ('layouts.myapp')
@section ('extendCSS')

<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('assets/global/plugins/select2/select2.css')}}"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="{{asset('assets/admin/pages/css/todo.css')}}" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
@endsection
@section ('content')

	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN STYLE CUSTOMIZER -->
			<div class="theme-panel hidden-xs hidden-sm hide">
				<div class="toggler">
				</div>
				<div class="toggler-close">
				</div>
				<div class="theme-options">
					<div class="theme-option theme-colors clearfix">
						<span>
						THEME COLOR </span>
						<ul>
							<li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default">
							</li>
							<li class="color-darkblue tooltips" data-style="darkblue" data-container="body" data-original-title="Dark Blue">
							</li>
							<li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue">
							</li>
							<li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey">
							</li>
							<li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light">
							</li>
							<li class="color-light2 tooltips" data-style="light2" data-container="body" data-html="true" data-original-title="Light 2">
							</li>
						</ul>
					</div>
					<div class="theme-option">
						<span>
						Theme Style </span>
						<select class="layout-style-option form-control input-sm">
							<option value="square" selected="selected">Square corners</option>
							<option value="rounded">Rounded corners</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Layout </span>
						<select class="layout-option form-control input-sm">
							<option value="fluid" selected="selected">Fluid</option>
							<option value="boxed">Boxed</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Header </span>
						<select class="page-header-option form-control input-sm">
							<option value="fixed" selected="selected">Fixed</option>
							<option value="default">Default</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Top Menu Dropdown</span>
						<select class="page-header-top-dropdown-style-option form-control input-sm">
							<option value="light" selected="selected">Light</option>
							<option value="dark">Dark</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Sidebar Mode</span>
						<select class="sidebar-option form-control input-sm">
							<option value="fixed">Fixed</option>
							<option value="default" selected="selected">Default</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Sidebar Menu </span>
						<select class="sidebar-menu-option form-control input-sm">
							<option value="accordion" selected="selected">Accordion</option>
							<option value="hover">Hover</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Sidebar Style </span>
						<select class="sidebar-style-option form-control input-sm">
							<option value="default" selected="selected">Default</option>
							<option value="light">Light</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Sidebar Position </span>
						<select class="sidebar-pos-option form-control input-sm">
							<option value="left" selected="selected">Left</option>
							<option value="right">Right</option>
						</select>
					</div>
					<div class="theme-option">
						<span>
						Footer </span>
						<select class="page-footer-option form-control input-sm">
							<option value="fixed">Fixed</option>
							<option value="default" selected="selected">Default</option>
						</select>
					</div>
				</div>
			</div>
			<!-- END STYLE CUSTOMIZER -->
			<!-- BEGIN PAGE HEADER-->
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Pages</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Todo</a>
					</li>
				</ul>
				<div class="page-toolbar">
					<div class="btn-group">
						<button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
						Actions <i class="fa fa-angle-down"></i>
						</button>
						<ul class="dropdown-menu pull-right" role="menu">
							<li>
								<a href="#">Action</a>
							</li>
							<li>
								<a href="#">Another action</a>
							</li>
							<li>
								<a href="#">Something else here</a>
							</li>
							<li class="divider">
							</li>
							<li>
								<a href="#">Separated link</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN TODO SIDEBAR -->
					<div class="todo-ui">
						<div class="todo-sidebar">
							<div class="portlet light">
								<div class="portlet-title">
									<div class="caption" data-toggle="collapse" data-target=".todo-project-list-content">
										<span class="caption-subject font-green-sharp bold uppercase">PROJECTS </span>
										<span class="caption-helper visible-sm-inline-block visible-xs-inline-block">click to view project list</span>
									</div>
									<div class="actions">
										<div class="btn-group">
											<a class="btn green-haze btn-circle btn-sm todo-projects-config" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
											<i class="icon-settings"></i> &nbsp; <i class="fa fa-angle-down"></i>
											</a>
											<ul class="dropdown-menu pull-right">
												<li>
													<a href="javascript:;">
													<i class="i"></i> New Project </a>
												</li>
												<li class="divider">
												</li>
												<li>
													<a href="javascript:;">
													Pending <span class="badge badge-danger">
													4 </span>
													</a>
												</li>
												<li>
													<a href="javascript:;">
													Completed <span class="badge badge-success">
													12 </span>
													</a>
												</li>
												<li>
													<a href="javascript:;">
													Overdue <span class="badge badge-warning">
													9 </span>
													</a>
												</li>
												<li class="divider">
												</li>
												<li>
													<a href="javascript:;">
													<i class="i"></i> Archived Projects </a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="portlet-body todo-project-list-content">
									<div class="todo-project-list">
										<ul class="nav nav-pills nav-stacked">
											<li>
												<a href="javascript:;">
												<span class="badge badge-success"> 6 </span> AirAsia Ads </a>
											</li>
											<li>
												<a href="javascript:;">
												<span class="badge badge-success"> 2 </span> HSBC Promo </a>
											</li>
											<li class="active">
												<a href="javascript:;">
												<span class="badge badge-success badge-active"> 3 </span> GlobalEx System </a>
											</li>
											<li>
												<a href="javascript:;">
												<span class="badge badge-default"> 14 </span> Empire City </a>
											</li>
											<li>
												<a href="javascript:;">
												<span class="badge badge-success"> 6 </span> AirAsia Ads </a>
											</li>
											<li>
												<a href="javascript:;">
												<span class="badge badge-success"> 2 </span> Loop Inc Promo </a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- END TODO SIDEBAR -->
						<!-- BEGIN TODO CONTENT -->
						<div class="todo-content">
							<div class="portlet light">
								<!-- PROJECT HEAD -->
								<div class="portlet-title">
									<div class="caption">
										<i class="icon-bar-chart font-green-sharp hide"></i>
										<span class="caption-helper">PROJECT:</span> &nbsp; <span class="caption-subject font-green-sharp bold uppercase">Tune Website</span>
									</div>
									<div class="actions">
										<div class="btn-group">
											<a class="btn green-haze btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
											MANAGE <i class="fa fa-angle-down"></i>
											</a>
											<ul class="dropdown-menu pull-right">
												<li>
													<a href="javascript:;">
													<i class="i"></i> New Task </a>
												</li>
												<li class="divider">
												</li>
												<li>
													<a href="javascript:;">
													Pending <span class="badge badge-danger">
													4 </span>
													</a>
												</li>
												<li>
													<a href="javascript:;">
													Completed <span class="badge badge-success">
													12 </span>
													</a>
												</li>
												<li>
													<a href="javascript:;">
													Overdue <span class="badge badge-warning">
													9 </span>
													</a>
												</li>
												<li class="divider">
												</li>
												<li>
													<a href="javascript:;">
													<i class="i"></i> Delete Project </a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<!-- end PROJECT HEAD -->
								<div class="portlet-body">
									<div class="row">
										<div class="col-md-5 col-sm-4">
											<div class="scroller" style="max-height: 600px;" data-always-visible="0" data-rail-visible="0" data-handle-color="#dae3e7">
												<div class="todo-tasklist">
													<div class="todo-tasklist-item todo-tasklist-item-border-green">
														<img class="todo-userpic pull-left" src="{{asset('assets/admin/layout/img/avatar4.jpg')}}" width="27px" height="27px">
														<div class="todo-tasklist-item-title">
															 Slider Redesign
														</div>
														<div class="todo-tasklist-item-text">
															 Lorem dolor sit amet ipsum dolor sit consectetuer dolore.
														</div>
														<div class="todo-tasklist-controls pull-left">
															<span class="todo-tasklist-date"><i class="fa fa-calendar"></i> 21 Sep 2014 </span>
															<span class="todo-tasklist-badge badge badge-roundless">Urgent</span>
														</div>
													</div>
													<div class="todo-tasklist-item todo-tasklist-item-border-red">
														<img class="todo-userpic pull-left" src="{{asset('assets/admin/layout/img/avatar5.jpg')}}" width="27px" height="27px">
														<div class="todo-tasklist-item-title">
															 Homepage Alignments to adjust
														</div>
														<div class="todo-tasklist-item-text">
															 Lorem ipsum dolor sit amet, consectetuer dolore dolor sit amet.
														</div>
														<div class="todo-tasklist-controls pull-left">
															<span class="todo-tasklist-date"><i class="fa fa-calendar"></i> 14 Sep 2014 </span>
															<span class="todo-tasklist-badge badge badge-roundless">Important</span>
														</div>
													</div>
													<div class="todo-tasklist-item todo-tasklist-item-border-green">
														<img class="todo-userpic pull-left" src="{{asset('assets/admin/layout/img/avatar9.jpg')}}" width="27px" height="27px">
														<div class="todo-tasklist-item-title">
															 Slider Redesign
														</div>
														<div class="todo-tasklist-controls pull-left">
															<span class="todo-tasklist-date"><i class="fa fa-calendar"></i> 10 Feb 2015 </span>
															<span class="todo-tasklist-badge badge badge-roundless">Important</span>&nbsp;
														</div>
													</div>
													<div class="todo-tasklist-item todo-tasklist-item-border-blue">
														<img class="todo-userpic pull-left" src="{{asset('assets/admin/layout/img/avatar6.jpg')}}" width="27px" height="27px">
														<div class="todo-tasklist-item-title">
															 Contact Us Map Location changes
														</div>
														<div class="todo-tasklist-item-text">
															 Lorem ipsum amet, consectetuer dolore dolor sit amet.
														</div>
														<div class="todo-tasklist-controls pull-left">
															<span class="todo-tasklist-date"><i class="fa fa-calendar"></i> 04 Oct 2014 </span>
															<span class="todo-tasklist-badge badge badge-roundless">Postponed</span>&nbsp; <span class="todo-tasklist-badge badge badge-roundless">Test</span>
														</div>
													</div>
													<div class="todo-tasklist-item todo-tasklist-item-border-purple">
														<img class="todo-userpic pull-left" src="{{asset('assets/admin/layout/img/avatar7.jpg')}}" width="27px" height="27px">
														<div class="todo-tasklist-item-title">
															 Projects list new Forms
														</div>
														<div class="todo-tasklist-item-text">
															 Lorem ipsum dolor sit amet, consectetuer dolore psum dolor sit.
														</div>
														<div class="todo-tasklist-controls pull-left">
															<span class="todo-tasklist-date"><i class="fa fa-calendar"></i> 19 Dec 2014 </span>
														</div>
													</div>
													<div class="todo-tasklist-item todo-tasklist-item-border-yellow">
														<img class="todo-userpic pull-left" src="{{asset('assets/admin/layout/img/avatar8.jpg')}}" width="27px" height="27px">
														<div class="todo-tasklist-item-title">
															 New Search Keywords
														</div>
														<div class="todo-tasklist-item-text">
															 Lorem ipsum dolor sit amet, consectetuer sit amet ipsum dolor, consectetuer ipsum consectetuer sit amet dolore.
														</div>
														<div class="todo-tasklist-controls pull-left">
															<span class="todo-tasklist-date"><i class="fa fa-calendar"></i> 02 Feb 2015 </span>
															<span class="todo-tasklist-badge badge badge-roundless">Postponed</span>&nbsp;
														</div>
													</div>
													<div class="todo-tasklist-item todo-tasklist-item-border-green">
														<img class="todo-userpic pull-left" src="{{asset('assets/admin/layout/img/avatar9.jpg')}}" width="27px" height="27px">
														<div class="todo-tasklist-item-title">
															 Slider Redesign
														</div>
														<div class="todo-tasklist-controls pull-left">
															<span class="todo-tasklist-date"><i class="fa fa-calendar"></i> 10 Feb 2015 </span>
															<span class="todo-tasklist-badge badge badge-roundless">Important</span>&nbsp;
														</div>
													</div>
													<div class="todo-tasklist-item todo-tasklist-item-border-red">
														<img class="todo-userpic pull-left" src="{{asset('assets/admin/layout/img/avatar5.jpg')}}" width="27px" height="27px">
														<div class="todo-tasklist-item-title">
															 Homepage Alignments to adjust
														</div>
														<div class="todo-tasklist-item-text">
															 Lorem ipsum dolor sit amet, consectetuer dolore psum dolor sit.
														</div>
														<div class="todo-tasklist-controls pull-left">
															<span class="todo-tasklist-date"><i class="fa fa-calendar"></i> 14 Sep 2014 </span>
															<span class="todo-tasklist-badge badge badge-roundless">Important</span>
														</div>
													</div>
													<div class="todo-tasklist-item todo-tasklist-item-border-blue">
														<img class="todo-userpic pull-left" src="{{asset('assets/admin/layout/img/avatar6.jpg')}}" width="27px" height="27px">
														<div class="todo-tasklist-item-title">
															 Contact Us Improvement
														</div>
														<div class="todo-tasklist-item-text">
															 Lorem ipsum amet, psum dolor sit consectetuer dolore.
														</div>
														<div class="todo-tasklist-controls pull-left">
															<span class="todo-tasklist-date"><i class="fa fa-calendar"></i> 21 Feb 2015 </span>
															<span class="todo-tasklist-badge badge badge-roundless">Postponed</span>&nbsp; <span class="todo-tasklist-badge badge badge-roundless">Primary</span>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="todo-tasklist-devider">
										</div>
										<div class="col-md-7 col-sm-8">
											<div class="scroller" style="max-height: 600px;" data-always-visible="0" data-rail-visible="0" data-handle-color="#dae3e7">
												<form action="#" class="form-horizontal">
													<!-- TASK HEAD -->
													<div class="form">
														<div class="form-group">
															<div class="col-md-8 col-sm-8">
																<div class="todo-taskbody-user">
																	<img class="todo-userpic pull-left" src="{{asset('assets/admin/layout/img/avatar6.jpg')}}" width="50px" height="50px">
																	<span class="todo-username pull-left">Vanessa Bond</span>
																	<button type="button" class="todo-username-btn btn btn-circle btn-default btn-xs">&nbsp;edit&nbsp;</button>
																</div>
															</div>
															<div class="col-md-4 col-sm-4">
																<div class="todo-taskbody-date pull-right">
																	<button type="button" class="todo-username-btn btn btn-circle btn-default btn-xs">&nbsp; Complete &nbsp;</button>
																</div>
															</div>
														</div>
														<!-- END TASK HEAD -->
														<!-- TASK TITLE -->
														<div class="form-group">
															<div class="col-md-12">
																<input type="text" class="form-control todo-taskbody-tasktitle" placeholder="Task Title...">
															</div>
														</div>
														<!-- TASK DESC -->
														<div class="form-group">
															<div class="col-md-12">
																<textarea class="form-control todo-taskbody-taskdesc" rows="8" placeholder="Task Description..."></textarea>
															</div>
														</div>
														<!-- END TASK DESC -->
														<!-- TASK DUE DATE -->
														<div class="form-group">
															<div class="col-md-12">
																<div class="input-icon">
																	<i class="fa fa-calendar"></i>
																	<input type="text" class="form-control todo-taskbody-due" placeholder="Due Date...">
																</div>
															</div>
														</div>
														<!-- TASK TAGS -->
														<div class="form-group">
															<div class="col-md-12">
																<input type="text" class="form-control todo-taskbody-tags" placeholder="Tags..." value="Pending, Requested">
															</div>
														</div>
														<!-- TASK TAGS -->
														<div class="form-actions right todo-form-actions">
															<button class="btn btn-circle btn-sm green-haze">Save Changes</button>
															<button class="btn btn-circle btn-sm btn-default">Cancel</button>
														</div>
													</div>
													<div class="tabbable-line">
														<ul class="nav nav-tabs ">
															<li class="active">
																<a href="#tab_1" data-toggle="tab">
																Comments </a>
															</li>
															<li>
																<a href="#tab_2" data-toggle="tab">
																History </a>
															</li>
														</ul>
														<div class="tab-content">
															<div class="tab-pane active" id="tab_1">
																<!-- TASK COMMENTS -->
																<div class="form-group">
																	<div class="col-md-12">
																		<ul class="media-list">
																			<li class="media">
																				<a class="pull-left" href="javascript:;">
																				<img class="todo-userpic" src="{{asset('assets/admin/layout/img/avatar8.jpg')}}" width="27px" height="27px">
																				</a>
																				<div class="media-body todo-comment">
																					<button type="button" class="todo-comment-btn btn btn-circle btn-default btn-xs">&nbsp; Reply &nbsp;</button>
																					<p class="todo-comment-head">
																						<span class="todo-comment-username">Christina Aguilera</span> &nbsp; <span class="todo-comment-date">17 Sep 2014 at 2:05pm</span>
																					</p>
																					<p class="todo-text-color">
																						 Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
																					</p>
																					<!-- Nested media object -->
																					<div class="media">
																						<a class="pull-left" href="javascript:;">
																						<img class="todo-userpic" src="{{asset('assets/admin/layout/img/avatar4.jpg')}}" width="27px" height="27px">
																						</a>
																						<div class="media-body">
																							<p class="todo-comment-head">
																								<span class="todo-comment-username">Carles Puyol</span> &nbsp; <span class="todo-comment-date">17 Sep 2014 at 4:30pm</span>
																							</p>
																							<p class="todo-text-color">
																								 Thanks so much my dear!
																							</p>
																						</div>
																					</div>
																				</div>
																			</li>
																			<li class="media">
																				<a class="pull-left" href="javascript:;">
																				<img class="todo-userpic" src="{{asset('assets/admin/layout/img/avatar5.jpg')}}" width="27px" height="27px">
																				</a>
																				<div class="media-body todo-comment">
																					<button type="button" class="todo-comment-btn btn btn-circle btn-default btn-xs">&nbsp; Reply &nbsp;</button>
																					<p class="todo-comment-head">
																						<span class="todo-comment-username">Andres Iniesta</span> &nbsp; <span class="todo-comment-date">18 Sep 2014 at 9:22am</span>
																					</p>
																					<p class="todo-text-color">
																						 Cras sit amet nibh libero, in gravida nulla. Scelerisque ante sollicitudin commodo Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. <br>
																					</p>
																				</div>
																			</li>
																			<li class="media">
																				<a class="pull-left" href="javascript:;">
																				<img class="todo-userpic" src="{{asset('assets/admin/layout/img/avatar6.jpg')}}" width="27px" height="27px">
																				</a>
																				<div class="media-body todo-comment">
																					<button type="button" class="todo-comment-btn btn btn-circle btn-default btn-xs">&nbsp; Reply &nbsp;</button>
																					<p class="todo-comment-head">
																						<span class="todo-comment-username">Olivia Wilde</span> &nbsp; <span class="todo-comment-date">18 Sep 2014 at 11:50am</span>
																					</p>
																					<p class="todo-text-color">
																						 Cras sit amet nibh libero, in gravida nulla. Scelerisque ante sollicitudin commodo Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. <br>
																					</p>
																				</div>
																			</li>
																		</ul>
																	</div>
																</div>
																<!-- END TASK COMMENTS -->
																<!-- TASK COMMENT FORM -->
																<div class="form-group">
																	<div class="col-md-12">
																		<ul class="media-list">
																			<li class="media">
																				<img class="todo-userpic pull-left" src="{{asset('assets/admin/layout/img/avatar4.jpg')}}" width="27px" height="27px">
																				<div class="media-body">
																					<textarea class="form-control todo-taskbody-taskdesc" rows="4" placeholder="Type comment..."></textarea>
																				</div>
																			</li>
																		</ul>
																		<button type="button" class="pull-right btn btn-sm btn-circle green-haze"> &nbsp; Submit &nbsp; </button>
																	</div>
																</div>
																<!-- END TASK COMMENT FORM -->
															</div>
															<div class="tab-pane" id="tab_2">
																<ul class="todo-task-history">
																	<li>
																		<div class="todo-task-history-date">
																			 20 Jun, 2014 at 11:35am
																		</div>
																		<div class="todo-task-history-desc">
																			 Task created
																		</div>
																	</li>
																	<li>
																		<div class="todo-task-history-date">
																			 21 Jun, 2014 at 10:35pm
																		</div>
																		<div class="todo-task-history-desc">
																			 Task category status changed to "Top Priority"
																		</div>
																	</li>
																	<li>
																		<div class="todo-task-history-date">
																			 22 Jun, 2014 at 11:35am
																		</div>
																		<div class="todo-task-history-desc">
																			 Task owner changed to "Nick Larson"
																		</div>
																	</li>
																	<li>
																		<div class="todo-task-history-date">
																			 30 Jun, 2014 at 8:09am
																		</div>
																		<div class="todo-task-history-desc">
																			 Task completed by "Nick Larson"
																		</div>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- END TODO CONTENT -->
					</div>
				</div>
				<!-- END PAGE CONTENT-->
			</div>
		</div>
	</div>
	<!-- END CONTENT -->
@endsection

@section ('extendJS')

@endsection