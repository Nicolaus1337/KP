@extends('layouts.master')
@push('css')
<style>
.card-1{
    background-color: #014C9F;
    color: #fff;
}

.card-2{
    background-color: #025CBF;
    color: #fff;
}

.card-3{
    background-color: #026BDE;
    color: #fff;
}

.card-4{
    background-color: #027afe;
    color: #fff;
}

</style>
@endpush 

@section('content')
<div class="main-content">
    
<div class="content-wrapper">
        <div class="row same-height">
            <div class="col-md-12">
                <div class="card" >
                    <div class="card-header text-center">
                        <h1 > WELCOME </h1>
                        <h4>Selamat datang, selamat bergabung dengan PT. Pupuk Kalimantan Timur</h4>
                    </div>
                    <div class="card-body">
                       
                    </div>
                </div>
            </div>
           
        </div>
        <div class="row same-height">
            <div class="col-md-12">
                <div class="card"  >
                    <div class="card-header">
                        <p>Selamat bergabung di Departemen IT Service & Business Partner PKT (Dept. TI)</p>
                        <p>Untuk dapat lebih mudah beradaptasi dengan lingkungan Dept. TI dapat membaca informasi dan petunjuk yang disediakan di sini</p>
                    </div>
                    <div class="card-body">
                       
                    </div>
                </div>
            </div>
            
           
        </div>

        <div class="row">
        <div class="col-md-3">
                <div class="card card-1" >
                <div class="card-header">
                        <div class="row">
                        <div class="col-md-6">
                        <h2>{{$totalonboarding}}</h2>
                        </div>
                        <div class="col-md-6 text-end">
                        <i class="ti-write" style="font-size: 32px"></i>
                        </div>

                        </div>
                    </div>
                    <div class="card-body">
                    <h5>Total Onboarding</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-2" >
                <div class="card-header">
                        <div class="row">
                        <div class="col-md-6">
                        <h2>{{$totaluser}}</h2>
                        </div>
                        <div class="col-md-6 text-end">
                        <i class="ti-user" style="font-size: 32px"></i>
                        </div>

                        </div>
                    </div>
                    <div class="card-body">
                       <h5 >Total User</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-3" >
                <div class="card-header">
                       <div class="row">
                        <div class="col-md-6">
                        <h2>{{$totalunitkerja}}</h2>
                        </div>
                        <div class="col-md-6 text-end">
                        <i class="ti-bag" style="font-size: 32px"></i>
                        </div>

                        </div>
                    </div>
                    <div class="card-body">
                    <h5  >Total Unit Kerja</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-4" >
                    <div class="card-header">
                        <div class="row">
                        <div class="col-md-6">
                        <h2>{{$totalguide}}</h2>
                        </div>
                        <div class="col-md-6 text-end">
                        <i class="ti-info-alt" style="font-size: 32px"></i>
                        </div>

                        </div>
                    </div>
                    <div class="card-body">
                    <h5>Total Guide</h5>
                    </div>
                </div>
            </div>

        </div>
    </div>


</div>


@endsection

@push('js')

@endpush