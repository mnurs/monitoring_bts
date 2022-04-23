<!-- Name Field -->
<div class="col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    <input type="text" name="name" class="form-control" value="@if(isset($user->name )){{ $user->name  }}@endif" disabled>   
</div>

<!-- Email Field -->
<div class="col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    <input type="text" name="email" class="form-control" value="@if(isset($user->email )){{ $user->email  }}@endif" disabled>   
</div>

<!-- Email Verified At Field -->
<!-- <div class="col-sm-12">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    <p>{{ $user->email_verified_at }}</p>
</div> -->

<!-- Password Field -->
<div class="col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    <input type="text" name="password" class="form-control" value="@if(isset($user->password )){{ $user->password  }}@endif" disabled>   
</div>

<!-- Remember Token Field -->
<!-- <div class="col-sm-12">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    <p>{{ $user->remember_token }}</p>
</div>
 -->
<!-- Role Field -->
<div class="col-sm-6">
    {!! Form::label('role', 'Role:') !!}
    <select name="level" class="form-control" disabled>
        <option value="1" @if($user->role == 1) selected @endif>Admin</option>
        <option value="2" @if($user->role == 2) selected @endif>Surveyor</option> 
    </select> 
</div>

<!-- Edited At Field -->
<div class="col-sm-6">
    {!! Form::label('edited_at', 'Edited At:') !!}
    <input type="text" name="edited_at" class="form-control" value="@if(isset($user->edited_at )){{ $user->edited_at  }}@endif" disabled>   
</div>

