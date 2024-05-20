@extends('admin/layout-admin')
@section('page_title','Contact List')



@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-12">
     
                @foreach($members as $company)

            <div class="row">
                <div class="col-md-4 col-12">
                    <div class="bg-white p-4">
                        <h1>Address</h1>
                    <p>
                    {{$company['address1']}}
                    </p>
                    <a href="{{url('admin/editcontactdetails')}}/{{$company->id}}" class="btn btn-success">Edit</a>
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