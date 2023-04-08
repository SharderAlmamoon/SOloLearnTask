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
                            <h1 class="portfolio__title fw-bold mb-5">Our Company Inputs</h1>
                        </div>
                        <!-- Portfolio Navigation Buttons List -->
                        <div class="col-8 offset-2" >
                           <form action="{{ route('multinational.store') }}" method="POST">
                            @csrf
                             <div class="form-group">
                                <label for="Customer_ID" >Customer Id <span class="text-danger">*</span></label>
                                <input type="text" class="form-control mt-2" name="customer_id" placeholder="Enter Customer Id">
                                @error('customer_id')
                                    <span class="text-danger font-weight-bold">{{ $message }}</span>
                                @enderror
                             </div>
                             <div class="form-group mt-2">
                                <label for="company_name" >Company Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control mt-2" name="company_name" placeholder="Enter Company Name">
                                @error('company_name')
                                   <span class="text-danger font-weight-bold">{{ $message }}</span>
                                @enderror 
                            </div>
                             <div class="form-group mt-2">
                                <label for="person_name" >Person Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control mt-2" name="person_name" placeholder="Enter Person Name">
                                @error('person_name')
                                 <span class="text-danger font-weight-bold">{{ $message }}</span>
                                @enderror 
                            </div>
                             <div class="form-group mt-2">
                                <label for="date_of_birth" >Date Of Birth <span class="text-danger">*</span></label>
                                <input type="date" class="form-control mt-2" name="date_of_birth">
                                @error('date_of_birth')
                                <span class="text-danger font-weight-bold">{{ $message }}</span>
                               @enderror 
                            </div>
                             <div class="form-group mt-2">
                                <label for="address" >Address <span class="text-danger">*</span></label>
                                <textarea name="address" id="address" cols="2" rows="2" class="form-control" placeholder="Enter Address Here"></textarea>
                                @error('address')
                                  <span class="text-danger font-weight-bold">{{ $message }}</span>
                                @enderror 
                            </div>
                             <div class="form-group mt-2">
                                <label for="official_email" >Official Email <span class="text-danger">*</span></label>
                                <input type="text" class="form-control mt-2" name="official_email" placeholder="Enter Official Email">
                                @error('official_email')
                                  <span class="text-danger font-weight-bold">{{ $message }}</span>
                                @enderror  
                            </div>
                             <div class="form-group mt-2">
                                <label for="phone_number" >Phone Number <span class="text-danger">*</span></label>
                                <input type="text" class="form-control mt-2" name="phone_number" placeholder="Enter Company Phone Number">
                                @error('phone_number')
                                  <span class="text-danger font-weight-bold">{{ $message }}</span>
                                @enderror 
                            </div>
                             <div class="form-group mt-2">
                                <label for="web_address" >Web Address <span class="text-danger">*</span></label>
                                <input type="url" class="form-control mt-2" name="web_address" placeholder="Enter Company Phone Number">
                                @error('web_address')
                                <span class="text-danger font-weight-bold">{{ $message }}</span>
                              @enderror 
                            </div>
                             <div class="form-group">
                               <button type="submit" class="btn btn-sm btn-success mt-4"> Submit</button>
                             </div>
                           </form>
                        </div>
                    </div>
                </div>
            </section>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

</body>
</html>