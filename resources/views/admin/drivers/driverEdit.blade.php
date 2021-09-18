@extends('layouts.admin-layout')

@section('content')
<div class="card card-warning">
    <div class="card-header text-right">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                
              <h1 class="card-title"><i class="fa fa-user"></i> Sürüjini üýtget <i class="far fa-edit"></i></h1>

        
              
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dolandyryş paneli</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('admin.drivers.index') }}">Sürüjiler</a></li>
                  <li class="breadcrumb-item active">Sürüjini üýtget</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
      </div>

            <div class="card-body">

              <form action="{{ route('admin.drivers.update', $driver->id) }}" method="post" enctype="multipart/form-data">

                  @csrf
                  @method('put')
                  <div class="row">
                  <div class="col-2">
                    <div class="form-group">
                      <label for="">Ady</label>
                      <input type="text" class="form-control" placeholder="Ady" name="ady" value="{{ $driver->ady }}">
                    </div>
                  
                  </div>
                  <div class="col-2">
                    <div class="form-group">
                    <label for="">Familiýasy</label>
                      <input type="text" class="form-control" placeholder="Familiýasy" name="familiyasy" value="{{ $driver->familiyasy }}">
                    </div>
                  </div>

                  <div class="col-2">
                    <div class="form-group">
                      <label for="">Atasynyň ady</label>
                      <input type="text" class="form-control" placeholder="Atasynyň ady" name="atasynyn_ady" value="{{ $driver->atasynyn_ady }}">
                    </div>
                  </div>

                  <div class="col-2">
                    <div class="form-group">
                      <label for="">Tabel belgisi</label>
                      <input type="text" class="form-control" placeholder="Tabel belgisi" name="tabel_belgisi" value="{{ $driver->tabel_belgisi }}">
                    </div>
                  </div>

                  <div class="col-2">
                    <div class="form-group">
                      <label for="">Doglan güni</label>
                      <input type="date" class="form-control" placeholder="Doglan güni" name="doglan_guni" data-date-format="DD-MMMM-YYYY" value="{{ $driver->doglan_guni }}">
                    </div>
                  </div>

                  <div class="col-2">
                    <div class="form-group">
                      <label for="">Doglan ýeri</label>
                      <input type="text" class="form-control" placeholder="Doglan ýeri" name="doglan_yeri" value="{{ $driver->doglan_yeri }}">
                    </div>
                  
                  </div>
                  
                  <div class="col-2">
                    <div class="form-group">
                      <label for="">Bilimi</label>
                      <input type="text" class="form-control" placeholder="Bilimi" name="bilimi" value="{{ $driver->bilimi }}">
                    </div>
                  </div>
                  
                  <div class="col-2">
                    <div class="form-group">
                      <label for="">Pasport belgisi</label>
                      <input type="text" class="form-control" placeholder="Pasport belgisi" name="pasport_belgisi" value="{{ $driver->pasport_belgisi }}">
                    </div>
                  </div>
                  
                  <div class="col-2">
                    <div class="form-group">
                      <label for="">Pasport alynan wagty</label>
                      <input type="date" class="form-control" placeholder="Pasport alynan wagty" name="pasport_alynan_wagty" data-date-format="DD-MMMM-YYYY" value="{{ $driver->pasport_alynan_wagty }}">
                    </div>
                  </div>
                  
                  <div class="col-2">
                    <div class="form-group">
                      <label>Telefon belgisi</label>
                      <input type="tel" class="form-control" name="telefon_belgisi" placeholder="+993" value="{{ $driver->telefon_belgisi }}">
                    </div>
                  </div>

                  <div class="col-4">
                    <div class="form-group">
                      <label for="exampleInputFile">Suraty</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile" name="suraty">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text" id="">Upload</span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-6">
                      <div class="form-group">
                        <label for="">Pasport alynan ýeri</label>
                        <input type="text" class="form-control" placeholder="Pasport alynan ýeri" name="pasport_alynan_yeri" value="{{ $driver->pasport_alynan_yeri }}">  
                      </div>
                    </div>


                    <div class="col-6">
                      <div class="form-group">
                        <label>Ýaşaýan salgysy</label>
                        <input type="text" class="form-control" name="yashayan_salgysy" placeholder="Ýaşaýan salgysy" value="{{ $driver->yashayan_salgysy }}">
                      </div>
                    </div>
                </div>


            </div>

          <div class="card-footer">
            <a href="{{ route('admin.drivers.index') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Yza</a>
                
                <div style="float: right;">
                  <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <button class="btn btn-warning" type="submit">Üýtget</button>
                  </form>               
                </div>

                </div>
               
              </div>
              <!-- /.card-body -->
            </div>  

@endsection
