@extends('layouts.main')

@section('title')
    User Management
@endsection

@section('content')

    <div class="row my-2">
        <div class="col">
            <input id="search-bar" oninput="search(this)" class="float-left form-control" type="text" placeholder="Search user...">
            <span class="fa fa-search in-input"></span>
            <span onclick="clearSearch()" class="btn badge badge-pill btn-primary in-input-pill">clear</span>
        </div>
        <div class="col">
            <button onclick="toggle(this, 'new-user')" class="float-right btn btn-secondary">@onoff New user</button>
        </div>
    </div>

    <div class="d-flex flex-wrap justify-content-center">
        
        <div id="new-user" class="card card-secondary m-2 hide">
            <div class="card-body card-secondary">
                <div>New User</div>
                <div>--</div>
                <form id="form-new">
                    <input type="text" name="firstname" class="form-control" placeholder="Firstname" required>
                    <input type="text" name="lastname" class="form-control" placeholder="Lastname" required>
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                    <input type="text" name="password" class="form-control" placeholder="Password" required>
                    <div class="my-2">
                        @foreach($roles as $role)
                            <div style="display:block">
                                <input name="{{ $role->name }}" id="NEW{{ $role->id }}" type="checkbox" class="hide">
                                <div onclick="check(this, 'NEW{{ $role->id }}')" class="btn btn-sm btn-secondary my-1"><span class="fa fa-circle-o mr-2 hide"></span><span class="fa fa-dot-circle-o mr-2"></span>{{ ucfirst($role->name) }}</div>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center">
                        <span class="btn btn-block btn-secondary" value="Add">Add</span>
                    </div>
                </form>
            </div>
        </div>

        @foreach($users as $user)
            <div class="card m-2">
                <div class="card-body">
                    <div>{{ $user->id }}.</div>
                    <div>Last seen : {{ $user->getLastSeen() }}</div>
                    <form id="form-edit{{ $user->id }}">
                        <input type="text" name="firstname" class="form-control" placeholder="Firstname" value="{{ $user->firstname }}" required>
                        <input type="text" name="lastname" class="form-control" placeholder="Lastname" value="{{ $user->lastname }}" required>
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}" required>
                        <input type="text" name="password" class="form-control" placeholder="Reset password...">
                        <div class="my-2">
                            @foreach($roles as $role)
                                <div style="display:block">
                                    <input name="{{ $role->name }}" id="{{ $user->id }}{{ $role->id }}" class="hide" type="checkbox" <?php if($user->hasRole($role->name)) echo "checked" ?>>
                                    <div onclick="toggle(this, '{{ $user->id }}{{ $role->id }}', 'check')" class="btn btn-sm btn-primary my-1"><span class="fa fa-circle-o mr-2" <?php if($user->hasRole($role->name)) echo "style='display:none'" ?>></span><span class="fa fa-dot-circle-o mr-2" <?php if(!$user->hasRole($role->name)) echo "style='display:none'" ?>></span>{{ ucfirst($role->name) }}</div>
                                    @if($role->name == "scout")
                                        <select class="form-control-sm" name="lead_id">
                                            <option value="" selected disabled>No team</option>
                                            @foreach($headscouts as $headscout)
                                                <option value="{{ $headscout->id }}"
                                                @if($user->getLeadId() == $headscout->id)
                                                    selected
                                                @endif   
                                                >{{ $headscout->firstname }} {{ $headscout->lastname }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <div class="text-center">
                            <span onclick="post(this, '/users/manage/edit/{{ $user->id }}', 'form-edit{{ $user->id }}')" class="btn btn-block btn-primary">Save @ajaxfeedback</span>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach

    </div>
    
@endsection