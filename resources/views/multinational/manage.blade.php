<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Developer Zahid">
    <meta name="description" content="Demo of how to use Isotope js with Bootstrap">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Category</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('backend/css/frontcss.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" integrity="sha512-3M00D/rn8n+2ZVXBO9Hib0GKNpkm8MSUU/e2VNthDyBYxKWG+BftNYYcuEjXlyrSO637tidzMBXfE7sQm0INUg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    

    <!-- /* Please ❤ this if you like it! 😊 */ -->
    <div class="container">
        <div class="row"> 
            <div class="col-md-4 mt-4">
                <a href="{{ route('manage.multinational') }}" class="btn btn-sm btn-info">Manage</a>&nbsp;
                <a href="{{ route('multinational.create') }}" class="btn btn-sm btn-info">Create New</a>
            </div> 
           
        </div>
    </div>

            <!-- Portfolio Section Start -->
            <section class="portfolio overflow-hidden">
                <div class="container">
                    <div class="row">
                        <!-- Portfolio Section Heading -->
                        <div class="portfolio__heading text-center col-12">
                            <h1 class="portfolio__title fw-bold mb-5">Our Company INformation</h1>
                        </div>
                        <!-- Portfolio Navigation Buttons List -->
                        <div class="d">
                            @if(Session::has('message'))
                            <div class="alert alert-primary" id="success-alert">
                                {{ Session::get('message') }}
                             </div>
                            @endif
                        </div>
                        <div class="d">
                            @if(Session::has('delete'))
                            <div class="alert alert-danger" id="success-alert">
                                {{ Session::get('delete') }}
                             </div>
                            @endif
                        </div>
                        <table class="table">
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">#SL</th>
                                <th scope="col">Customer Id</th>
                                <th scope="col">Company Name</th>
                                <th scope="col">Person Name</th>
                                <th scope="col">Date Of Birth</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($multinationals as $key=>$multi)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ Str::limit($multi->customer_id,10) }}</td>
                                    <td>{{ $multi->company_name }}</td>
                                    <td>{{ $multi->person_name }}</td>
                                    <td>{{\Carbon\Carbon::parse($multi->date_of_birth)->format('j F Y') }}</td>
                                    <td>{{ $multi->official_email }}</td>
                                    <td>{{ $multi->phone_number }}</td>
                                    <td >
                                        <a href="{{ route('multinational.edit',$multi->id) }}" class="text-warning"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('multinational.delete',$multi->id) }}" onclick="return confirm('Are You Sure Want To Delete')" class="text-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
            </section>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

</body>
</html>