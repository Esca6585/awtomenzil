@extends('layouts.admin-layout')

@section('content')

            <div class="card card-primary">
              <div class="card-header text-right">
              <section class="content-header">
                <div class="container-fluid">
                  <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="card-title"><i class="fas fa-user-circle" aria-hidden="true"></i> Ulanyjylar</h1>

                    </div>
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dolandyryş paneli</a></li>
                        <li class="breadcrumb-item" style="color: #c0c0c0">Ulanyjylar</li>
                      </ol>
                    </div>
                  </div>
                </div><!-- /.container-fluid -->
              </section>
                <a href="{{ route('admin.users.create') }}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Ulanyjy goşmak</a>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                

                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Ulanyjynyň ady we familiýasy</th>
                    <th>Email</th>
                    <th>Awto Toplumy</th>
                    <th>Suraty</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach($users as $user)
                        <tr>
                          <td>{{ $user->id }}</td>
                          <td>{{ $user->name }} {{ $user->surname }}</td>
                          <td>{{ $user->email }}</td>
                          <td>
                            @if($user->autocolumn_id == 12345)
                              Super Admin <i class="fa fa-user-cog" style="color: darkblue"></i>
                            @else
                              {{ $user->autocolumn_id }} @if($user->autocolumn_id == 6 || $user->autocolumn_id == 9 || $user->autocolumn_id == 10) - njy @else - nji @endif Awto Toplum Admin <i class="fa fa-user"></i>
                            @endif
                          </td>
                          <td><img src="{{ asset($user->image) }}" alt="{{ $user->image }}" width="100px"></td>
                          <td>
                          
                              <form method="post" action="{{ route('admin.users.destroy', $user->id) }}" onsubmit="return confirm('Are you sure you want to delete this category?');">
                              
                                <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                               
                                  @csrf
                                  @method('delete')
                                <button type="submit" id="deleteBtn" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                
                              </form>
                          </td>
                        </tr>
                      @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Ulanyjynyň ady we familiýasy</th>
                    <th>Email</th>
                    <th>Awto Toplumy</th>
                    <th>Suraty</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>
                
              

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

@endsection
