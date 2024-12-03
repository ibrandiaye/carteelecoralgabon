{{-- \resources\views\permissions\create.blade.php --}}
@extends('welcome')

@section('title', '| Enregister Département')

@section('content')
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="#">Province</a></li>
        <li class="breadcrumb-item active" aria-current="page">AJOUT D'UN COMMUNE OU D'UNE DEPARTEMENT</li>
    </ol>
</nav>
<!-- /Breadcrumb -->

<!-- Container -->
<div class="container">

    <form action="{{ route('commoudept.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-header  text-center">FORMULAIRE D'ENREGISTREMENT D'UNE DEPARTEMENT</div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Commune  ou Commoudept</label>
                        <input type="text" name="commoudept"  value="{{ old('commoudept') }}" class="form-control" min="1" required>
                    </div>
                </div>
                    <div class="col-lg-6">
                        <label>Province</label>
                        <select class="form-control" name="province_id" required="">
                            @foreach ($provinces as $province)
                            <option value="{{$province->id}}">{{$province->province}}</option>
                                @endforeach

                        </select>
                    </div>

                <div>
                    <center>
                        <button type="submit" class="btn btn-success btn btn-lg "> ENREGISTRER</button>
                    </center>
                </div>
            </div>

        </div>

    </form>
</div>

@endsection


