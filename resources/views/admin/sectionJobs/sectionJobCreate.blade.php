@extends('layouts.admin-layout')

@section('content')
<div class="card card-success">
    <div class="card-header text-right">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                
                <h1 class="card-title"><i class="fa fa-list-alt"></i> {{ $section->name }}ne <i class="fas fa-chevron-right"></i> <i class="fa fa-briefcase"></i> Wezipe goşmak <i class="fa fa-plus"></i> </h1>
              
              
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dolandyryjy paneli</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('admin.sectionsjobs.show', $section->id ) }}">{{ $section->name }}</a></li>
                  <li class="breadcrumb-item" style="color: #c0c0c0">{{ $section->name }}ne <i class="fas fa-chevron-right"></i> <i class="fa fa-briefcase"></i> Wezipe goşmak </li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
      </div>

            <div class="card-body">
              <form action="{{ route('admin.sectionsjobs.store') }}" method="post">
                @csrf
                
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Wezipäniň ady</label>
                      <input type="text" class="form-control" placeholder="Wezipäniň ady" name="name">
                    </div>
                  </div>
  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Bölümi</label>
                      <select class="select2" data-placeholder="Bölüm saýlaň" style="width: 100%;" name="parent_id">
                        <option value="{{ $section->id }}" >{{ $section->name }}</option>
                      </select>
                    </div>
                  </div>
                </div>
                    
            </div>
                

                <div class="card-footer">
                  <a href="{{ route('admin.sectionsjobs.index') }}" class="btn btn-default"><i class="fas fa-exit"></i> Yza</a>
                
                <div style="float: right;">

                    {{-- <input type="hidden" name="id" value="{{ $section->id }}"> --}}

                    <button class="btn btn-success" type="submit">Goşmak</button>
                  </form>               
                </div>

                </div>

              
              </div>
              <!-- /.card-body -->
            </div>    

@endsection
