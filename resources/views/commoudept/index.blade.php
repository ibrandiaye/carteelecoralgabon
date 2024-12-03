@extends('welcome')
@section('title', '| commoudept')


@section('content')
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="#">Province</a></li>
        <li class="breadcrumb-item active" aria-current="page">MODIFICATION D'UN COMMUNE OU D'UNE DEPARTMENT</li>
    </ol>
</nav>
<!-- /Breadcrumb -->

<!-- Container -->
<div class="container">

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="col-12">
        <div class="card ">
            <div class="card-header">LISTE D'ENREGISTREMENT DES Départements</div>
                <div class="card-body">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalform2">
                        importer
                    </button>
                    <table id="example1" class="table table-bordered table-responsive-md table-striped text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Commune  ou Departement</th>
                                <th>Nom province</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($commoudepts as $commoudept)
                            <tr>
                                <td>{{ $commoudept->id }}</td>
                                <td>{{ $commoudept->commoudept }}</td>
                                <td>{{ $commoudept->province->province }}</td>
                                <td>
                                    <a href="{{ route('commoudept.edit', $commoudept->id) }}" role="button" class="btn btn-primary"><i class="fa fa-edit"></i></a>

                                    <a  href="{{ route('commoudept.destroy', $commoudept->id) }}" class="btn btn-danger"  onclick="if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]><i class="fa fa-trash"></i></a>




                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>




                <div class="modal fade" id="exampleModalform2" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{ route('importer.commoudept') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Importer Commune ou Departement</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group no-margin">
                                            <label for="field-7" class="control-label">Document</label>
                                            <input type="file" name="file" class="form-control" required>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Valider</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
@endsection
