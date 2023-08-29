@extends('layouts.main')

@section('container')
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Contact</strong></div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="mb-5 text-black">Member of Arthur Citra Media :</h2>
          </div>
          <div class="col-md-7">
            <!-- START FORM -->
            @if ($errors->any())
            <div class="pt-3">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

            <form method='post' action='{{url('customer')}}' enctype="multipart/form-data">
            @csrf
              
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="namaCustomer" class="text-black">Nama <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="namaCustomer" name="namaCustomer" placeholder="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="whatsapp" class="text-black">Whatsapp <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="">
                  </div>
                </div>
                <div class="form-group row mb-1">
                  <div class="col-md-12">
                    <label for="email" class="text-black">Email </label>
                    <input type="email" class="form-control" id="email" name="email">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-lg-12">
                    <label for="button" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-5 ml-auto">
            <div class="p-4 border mb-3">
              <span class="d-block text-primary h6 text-uppercase">New York</span>
              <p class="mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
            </div>
            <div class="p-4 border mb-3">
              <span class="d-block text-primary h6 text-uppercase">London</span>
              <p class="mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
            </div>
            <div class="p-4 border mb-3">
              <span class="d-block text-primary h6 text-uppercase">Canada</span>
              <p class="mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
            </div>

          </div>
        </div>
      </div>
    </div>

@endsection