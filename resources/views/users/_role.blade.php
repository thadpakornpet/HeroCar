<h3>จัดการสิทธิ์การใช้งาน</h3><br/>
<?php
$collection_role = $user->getRoleNames();
$old_role = $collection_role->implode('-');

$collection_permision = $user->getPermissionNames();
$old_permission = $collection_permision->implode('-');
?>
    <form action="{{ url('users/roles') }}" method="post" class="form-horizontal">
        {!! csrf_field() !!}
        <div class="form-group row">
            <label class="col-md-1 col-form-label text-required">Role : </label>
            <div class="col-sm-5">
              <select class="form-control" name="roles" required>
                  <option value=""></option>
                  @foreach($roles as $role)
                  <option value="{{ $role->name }}" @if($old_role == $role->name) selected @endif>{{ strtoupper($role->name) }}</option>
                  @endforeach
              </select>
            </div>

            <label class="col-md-1 col-form-label text-required">Permission : </label>
            <div class="col-sm-5">
                <select class="form-control" name="permissions" required>
                    <option value=""></option>
                    @foreach($permissions as $permission)
                    <option value="{{ $permission->name }}" @if($old_permission == $permission->name) selected @endif>{{ $permission->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <input type="hidden" name="id" value="{{ $user->id }}">
        <input type="hidden" name="old_role" value="{{ $old_role }}">
        <input type="hidden" name="old_permission" value="{{ $old_permission }}">
        <div class="form-group">
            <div class="pull-right">
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;@lang('logs.save')</button>
            </div>
        </div>

    </form>
