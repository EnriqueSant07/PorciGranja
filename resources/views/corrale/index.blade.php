@extends('layouts.app')

@section('template_title')
    Corrale
@endsection

@section('content')
@include('layouts.nav_menu')

@include('layouts.menu')
<main id="main" class="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Corrale') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('corrales.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Granjas Id</th>
										<th>Disponibilidad</th>

                                        <th>Botones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($corrales as $corrale)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $corrale->name }}</td>
											<td>{{ $corrale->granjas_id }}</td>
											<td>{{ $corrale->disponibilidad }}</td>

                                            <td class="botones">
                                                <form action="{{ route('corrales.destroy',$corrale->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('corrales.show',$corrale->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('corrales.edit',$corrale->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    @if (auth()->user()->rol === 'admin')
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                                    class="fa fa-fw fa-trash"></i>
                                                                {{ __('Delete') }}</button>
                                                        @endif
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $corrales->links() !!}
            </div>
        </div>
    </div>
</main>
@endsection
