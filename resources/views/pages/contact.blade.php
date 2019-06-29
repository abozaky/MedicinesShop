@extends('layouts.front')

@section('content')

<!-- Start Contact Us Page -->

<div class=" container " >
     @if (Session('success'))

            <h3 id="test" class="alert alert-primary text-center m-1" role="alert">
             {{ Session('success') }}
            </h3>
        @elseif(Session('Fail'))
            
            <h3 id="test" class="alert alert-danger text-center m-1" role="alert">
             {{ Session('Fail') }}
            </h3>

        @endif  
     <div class="row my-5">
        <div class="col-8">
            <h2 class="text-left section_header mb-5 "><span class="  ">Contact With Us</span></h2>

            <form method="post" action="{{route('SendMail')}}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Full Name</label>
                        <input name="Name"  type="text" class="form-control" id="inputEmail4" placeholder="Full Name"></>
                    @error('Name')
                         <label class="text-danger"> {{ $message }}</label>
                    @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Subject</label>
                        <input name="Subject" type="text" class="form-control" id="inputPassword4" placeholder="Subject"></>
                    @error('Subject')
                         <label class="text-danger"> {{ $message }}</label>
                    @enderror

                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input name="Email" type="email" class="form-control" id="inputEmail4" placeholder="Email"></>
                    @error('Email')
                         <label class="text-danger"> {{ $message }}</label>
                    @enderror

                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Phone Number</label>
                        <input name="Phone" type="" class="form-control" id="inputPassword4" placeholder="Phone Number"></>
                    @error('Phone')
                         <label class="text-danger"> {{ $message }}</label>
                    @enderror

                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleFormControlTextarea1">Message</label>
                        <textarea name="Message" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                     @error('Message')
                         <label class="text-danger"> {{ $message }}</label>
                    @enderror

                    </div>
                </div>


                <button type="submit" class="btn btn-info">Send Message</button>
            </form>
        </div>
 

    </div>
    
    
</div>

<!-- End Contact Us Page -->

@endsection