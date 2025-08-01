@extends('admin/layout-admin')
@section('page_title','About List')



@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-12">
     
                @foreach($members as $company)

            <div class="row">
                <div class="col-md-4 col-12">
                    <div class="bg-white p-4">
                        <h1>Introduction</h1>
                    <p>
                    {{$company['introduction']}}
                    </p>
                    <a href="{{url('admin/editaboutdetails')}}/{{$company->id}}" class="btn btn-success">Edit</a>
                </div>
                </div>
            </div>
           @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection