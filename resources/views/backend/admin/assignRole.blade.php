@extends('backend.layouts.main')
@section('title', 'Admin Section')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Admin Area</a></li>
    <li class="breadcrumb-item active">Assign Role</li>
@endsection

@section('content')


    <div class="col-12">
        <div class="row">
            <div class="col-8">
                <h1 style="font-size: 20px;color: #000;">Assign permission for <span style="font-weight: bold;color: #16b7dc;">{{$role->name}}</span> Role</h1>
            </div>
            <div class="col-4">
                <button id="saveForm" type="submit" class="btn btn-primary float-right">Save</button>
            </div>
        </div>
    </div>
    <div class="col-12" id="permissionForm">
        <form role="form" method="post" action="{{route('assignRoleUpdate',$role->id)}}">
            @csrf
            @method('PATCH')
        <div class="row">
            <div class="col-4">
                <!-- Default box -->
                <div class="card card-outline card-primary collapsed-card">
                    <div class="card-header">
                        <?php
                        $blood_create = in_array('create-bloodgroup', $permissions)? 'fas': 'far';
                        $blood_read = in_array('read-bloodgroup', $permissions)? 'fas': 'far';
                        $blood_edit = in_array('edit-bloodgroup', $permissions)? 'fas': 'far';
                        $blood_delete = in_array('delete-bloodgroup', $permissions)? 'fas': 'far';

                        $religion_create = in_array('create-religion', $permissions)? 'fas': 'far';
                        $religion_read = in_array('read-religion', $permissions)? 'fas': 'far';
                        $religion_edit = in_array('edit-religion', $permissions)? 'fas': 'far';
                        $religion_delete = in_array('delete-religion', $permissions)? 'fas': 'far';

                        $gender_create = in_array('create-gender', $permissions)? 'fas': 'far';
                        $gender_read = in_array('read-gender', $permissions)? 'fas': 'far';
                        $gender_edit = in_array('edit-gender', $permissions)? 'fas': 'far';
                        $gender_delete = in_array('delete-gender', $permissions)? 'fas': 'far';

                        $user_create = in_array('create-user', $permissions)? 'fas': 'far';
                        $user_read = in_array('read-user', $permissions)? 'fas': 'far';
                        $user_edit = in_array('edit-user', $permissions)? 'fas': 'far';
                        $user_delete = in_array('delete-user', $permissions)? 'fas': 'far';

                        $role_create = in_array('create-role', $permissions)? 'fas': 'far';
                        $role_read = in_array('read-role', $permissions)? 'fas': 'far';
                        $role_edit = in_array('edit-role', $permissions)? 'fas': 'far';
                        $role_delete = in_array('delete-role', $permissions)? 'fas': 'far';

                        $permission_create = in_array('create-permission', $permissions)? 'fas': 'far';
                        $permission_read = in_array('read-permission', $permissions)? 'fas': 'far';
                        $permission_edit = in_array('edit-permission', $permissions)? 'fas': 'far';
                        $permission_delete = in_array('delete-permission', $permissions)? 'fas': 'far';






                        $ward_create = in_array('create-ward', $permissions)? 'fas': 'far';
                        $ward_read = in_array('read-ward', $permissions)? 'fas': 'far';
                        $ward_edit = in_array('edit-ward', $permissions)? 'fas': 'far';
                        $ward_delete = in_array('delete-ward', $permissions)? 'fas': 'far';

                        $speciality_create = in_array('create-speciality', $permissions)? 'fas': 'far';
                        $speciality_read = in_array('read-speciality', $permissions)? 'fas': 'far';
                        $speciality_edit = in_array('edit-speciality', $permissions)? 'fas': 'far';
                        $speciality_delete = in_array('delete-speciality', $permissions)? 'fas': 'far';

                        $rack_create = in_array('create-rack', $permissions)? 'fas': 'far';
                        $rack_read = in_array('read-rack', $permissions)? 'fas': 'far';
                        $rack_edit = in_array('edit-rack', $permissions)? 'fas': 'far';
                        $rack_delete = in_array('delete-rack', $permissions)? 'fas': 'far';

                        $files_create = in_array('create-files', $permissions)? 'fas': 'far';
                        $files_read = in_array('read-files', $permissions)? 'fas': 'far';
                        $files_edit = in_array('edit-files', $permissions)? 'fas': 'far';
                        $files_delete = in_array('delete-files', $permissions)? 'fas': 'far';

                        $locker_create = in_array('create-locker', $permissions)? 'fas': 'far';
                        $locker_read = in_array('read-locker', $permissions)? 'fas': 'far';
                        $locker_edit = in_array('edit-locker', $permissions)? 'fas': 'far';
                        $locker_delete = in_array('delete-locker', $permissions)? 'fas': 'far';

                        $issued_create = in_array('create-issued', $permissions)? 'fas': 'far';
                        $issued_read = in_array('read-issued', $permissions)? 'fas': 'far';
                        $issued_edit = in_array('edit-issued', $permissions)? 'fas': 'far';
                        $issued_delete = in_array('delete-issued', $permissions)? 'fas': 'far';

                        $doctor_create = in_array('create-doctor', $permissions)? 'fas': 'far';
                        $doctor_read = in_array('read-doctor', $permissions)? 'fas': 'far';
                        $doctor_edit = in_array('edit-doctor', $permissions)? 'fas': 'far';
                        $doctor_delete = in_array('delete-doctor', $permissions)? 'fas': 'far';
                        ?>
                        <h3 class="card-title"> Bloodgroup </h3>
                        <span >

                        </span>
                        <div class="card-tools ">
                            <i class="{{$blood_create}} fa-circle text-info"></i>
                            <i class="{{$blood_read}} fa-circle text-info"></i>
                            <i class="{{$blood_edit}} fa-circle text-info"></i>
                            <i class="{{$blood_delete}} fa-circle text-info"></i>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'create-bloodgroup') @php $blood_class='text-warning'; @endphp checked @endif @endforeach value="create-bloodgroup" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Create</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'read-bloodgroup') checked @endif @endforeach value="read-bloodgroup" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Read</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'edit-bloodgroup') checked @endif @endforeach value="edit-bloodgroup" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Edit</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'delete-bloodgroup') checked @endif @endforeach value="delete-bloodgroup" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Delete</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card card-outline card-primary collapsed-card">
                    <div class="card-header">

                        <h3 class="card-title"> Religion </h3>

                        <div class="card-tools">
                            <i class="{{$religion_create}} fa-circle text-info"></i>
                            <i class="{{$religion_read}} fa-circle text-info"></i>
                            <i class="{{$religion_edit}} fa-circle text-info"></i>
                            <i class="{{$religion_delete}} fa-circle text-info"></i>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'create-religion') checked @endif @endforeach value="create-religion" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Create</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'read-religion') checked @endif @endforeach value="read-religion" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Read</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'edit-religion') checked @endif @endforeach value="edit-religion" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Edit</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'delete-religion') checked @endif @endforeach value="delete-religion" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Delete</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card card-outline card-primary collapsed-card">
                    <div class="card-header">

                        <h3 class="card-title"> Gender </h3>

                        <div class="card-tools">
                            <i class="{{$gender_create}} fa-circle text-info"></i>
                            <i class="{{$gender_read}} fa-circle text-info"></i>
                            <i class="{{$gender_edit}} fa-circle text-info"></i>
                            <i class="{{$gender_delete}} fa-circle text-info"></i>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'create-gender') checked @endif @endforeach value="create-gender" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Create</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'read-gender') checked @endif @endforeach value="read-gender" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Read</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'edit-gender') checked @endif @endforeach value="edit-gender" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Edit</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'delete-gender') checked @endif @endforeach value="delete-gender" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Delete</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card card-outline card-primary collapsed-card">
                    <div class="card-header">

                        <h3 class="card-title"> User </h3>

                        <div class="card-tools">
                            <i class="{{$user_create}} fa-circle text-info"></i>
                            <i class="{{$user_read}} fa-circle text-info"></i>
                            <i class="{{$user_edit}} fa-circle text-info"></i>
                            <i class="{{$user_delete}} fa-circle text-info"></i>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'create-user') checked @endif @endforeach value="create-user" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Create</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'read-user') checked @endif @endforeach value="read-user" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Read</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'edit-user') checked @endif @endforeach value="edit-user" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Edit</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'delete-user') checked @endif @endforeach value="delete-user" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Delete</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card card-outline card-primary collapsed-card">
                    <div class="card-header">

                        <h3 class="card-title"> Role </h3>

                        <div class="card-tools">
                            <i class="{{$role_create}} fa-circle text-info"></i>
                            <i class="{{$role_read}} fa-circle text-info"></i>
                            <i class="{{$role_edit}} fa-circle text-info"></i>
                            <i class="{{$role_delete}} fa-circle text-info"></i>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'create-role') checked @endif @endforeach value="create-role" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Create</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'read-role') checked @endif @endforeach value="read-role" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Read</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'edit-role') checked @endif @endforeach value="edit-role" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Edit</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'delete-role') checked @endif @endforeach value="delete-role" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Delete</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            <div class="col-4">
                <div class="card card-outline card-primary collapsed-card">
                    <div class="card-header">

                        <h3 class="card-title"> Permission </h3>

                        <div class="card-tools">
                            <i class="{{$permission_create}} fa-circle text-info"></i>
                            <i class="{{$permission_read}} fa-circle text-info"></i>
                            <i class="{{$permission_edit}} fa-circle text-info"></i>
                            <i class="{{$permission_delete}} fa-circle text-info"></i>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'create-permission') checked @endif @endforeach value="create-permission" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Create</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'read-permission') checked @endif @endforeach value="read-permission" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Read</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'edit-permission') checked @endif @endforeach value="edit-permission" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Edit</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'delete-permission') checked @endif @endforeach value="delete-permission" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Delete</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card card-outline card-primary collapsed-card">
                    <div class="card-header">

                        <h3 class="card-title"> Ward </h3>

                        <div class="card-tools">
                            <i class="{{$ward_create}} fa-circle text-info"></i>
                            <i class="{{$ward_read}} fa-circle text-info"></i>
                            <i class="{{$ward_edit}} fa-circle text-info"></i>
                            <i class="{{$ward_delete}} fa-circle text-info"></i>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'create-ward') checked @endif @endforeach value="create-ward" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Create</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'read-ward') checked @endif @endforeach value="read-ward" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Read</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'edit-ward') checked @endif @endforeach value="edit-ward" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Edit</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'delete-ward') checked @endif @endforeach value="delete-ward" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Delete</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card card-outline card-primary collapsed-card">
                    <div class="card-header">

                        <h3 class="card-title"> Speciality </h3>

                        <div class="card-tools">
                            <i class="{{$speciality_create}} fa-circle text-info"></i>
                            <i class="{{$speciality_read}} fa-circle text-info"></i>
                            <i class="{{$speciality_edit}} fa-circle text-info"></i>
                            <i class="{{$speciality_delete}} fa-circle text-info"></i>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'create-speciality') checked @endif @endforeach value="create-speciality" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Create</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'read-speciality') checked @endif @endforeach value="read-speciality" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Read</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'edit-speciality') checked @endif @endforeach value="edit-speciality" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Edit</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'delete-speciality') checked @endif @endforeach value="delete-speciality" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Delete</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card card-outline card-primary collapsed-card">
                    <div class="card-header">

                        <h3 class="card-title"> Rack </h3>

                        <div class="card-tools">
                            <i class="{{$rack_create}} fa-circle text-info"></i>
                            <i class="{{$rack_read}} fa-circle text-info"></i>
                            <i class="{{$rack_edit}} fa-circle text-info"></i>
                            <i class="{{$rack_delete}} fa-circle text-info"></i>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'create-rack') checked @endif @endforeach value="create-rack" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Create</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'read-rack') checked @endif @endforeach value="read-rack" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Read</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'edit-rack') checked @endif @endforeach value="edit-rack" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Edit</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'delete-rack') checked @endif @endforeach value="delete-rack" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Delete</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            <div class="col-4">
                <div class="card card-outline card-primary collapsed-card">
                    <div class="card-header">

                        <h3 class="card-title"> Files </h3>

                        <div class="card-tools">
                            <i class="{{$files_create}} fa-circle text-info"></i>
                            <i class="{{$files_read}} fa-circle text-info"></i>
                            <i class="{{$files_edit}} fa-circle text-info"></i>
                            <i class="{{$files_delete}} fa-circle text-info"></i>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'create-files') checked @endif @endforeach value="create-files" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Create</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'read-files') checked @endif @endforeach value="read-files" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Read</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'edit-files') checked @endif @endforeach value="edit-files" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Edit</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'delete-files') checked @endif @endforeach value="delete-files" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Delete</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card card-outline card-primary collapsed-card">
                    <div class="card-header">

                        <h3 class="card-title"> Locker </h3>

                        <div class="card-tools">
                            <i class="{{$locker_create}} fa-circle text-info"></i>
                            <i class="{{$locker_read}} fa-circle text-info"></i>
                            <i class="{{$locker_edit}} fa-circle text-info"></i>
                            <i class="{{$locker_delete}} fa-circle text-info"></i>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'create-locker') checked @endif @endforeach value="create-locker" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Create</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'read-locker') checked @endif @endforeach value="read-locker" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Read</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'edit-locker') checked @endif @endforeach value="edit-locker" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Edit</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'delete-locker') checked @endif @endforeach value="delete-locker" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Delete</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card card-outline card-primary collapsed-card">
                    <div class="card-header">

                        <h3 class="card-title"> Issue File </h3>

                        <div class="card-tools">
                            <i class="{{$issued_create}} fa-circle text-info"></i>
                            <i class="{{$issued_read}} fa-circle text-info"></i>
                            <i class="{{$issued_edit}} fa-circle text-info"></i>
                            <i class="{{$issued_delete}} fa-circle text-info"></i>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'create-issued') checked @endif @endforeach value="create-issued" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Create</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'read-issued') checked @endif @endforeach value="read-issued" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Read</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'edit-issued') checked @endif @endforeach value="edit-issued" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Edit</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'delete-issued') checked @endif @endforeach value="delete-issued" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Delete</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card card-outline card-primary collapsed-card">
                    <div class="card-header">

                        <h3 class="card-title"> Doctor </h3>

                        <div class="card-tools">
                            <i class="{{$doctor_create}} fa-circle text-info"></i>
                            <i class="{{$doctor_read}} fa-circle text-info"></i>
                            <i class="{{$doctor_edit}} fa-circle text-info"></i>
                            <i class="{{$doctor_delete}} fa-circle text-info"></i>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'create-doctor') checked @endif @endforeach value="create-doctor" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Create</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'read-doctor') checked @endif @endforeach value="read-doctor" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Read</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- checkbox -->
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'edit-doctor') checked @endif @endforeach value="edit-doctor" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Edit</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" @foreach($permissions as $v) @if($v == 'delete-doctor') checked @endif @endforeach value="delete-doctor" name="permission[]" type="checkbox">
                                        <label class="form-check-label">Delete</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        </form>
    </div>



@endsection

@section('script')
    <script type="text/javascript">
        $('#saveForm').on('click', function (){
            $('#permissionForm form').submit();
        })
    </script>
@endsection

