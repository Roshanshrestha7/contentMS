@extends('frontend.layout.app')
@section('content')

    <div class="card"  style="padding-top: 40px; background-color: lightgrey; min-height: 600px;">

            <div class="card-body" >
                <div class="col-md-6" >
                    <h3>Google map</h3>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.866782615395!2d85.3417953150617!3d27.69051198279882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb199225ddb01b%3A0x5bdcec622a9c4d75!2sYoung+Minds+Creation+(P)+Ltd!5e0!3m2!1sen!2snp!4v1559645661071!5m2!1sen!2snp" width="100%" height="412" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>

                <div class="col-md-6">
                    <div style="padding-left: 10px; padding-right: 20px">
                        <h3>Drop Your Message</h3>
                        <div class="row" style="background-color: white; padding: 20px; border-radius: 3px  ">

                            {{ Form::open(array('url' => 'admin/contact','method' => 'post')) }}
                            @csrf

                                <div class="form-group {{ ($errors->has('name'))?'has-error':'' }}">
                                    <label for="title">Full Name:</label>
                                    <input type="text" name="name" class="form-control" placeholder="Full Name">
                                    {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
                                </div>
                                <div class="form-group {{ ($errors->has('email'))?'has-error':'' }}">
                                    <label for="title">Email:</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                    {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
                                </div>
                                <div class="form-group {{ ($errors->has('message'))?'has-error':'' }}">
                                    <label for="about">Message</label>
                                    <textarea name="message" id="about" cols="6" rows="6" placeholder="Enter ......" class="form-control"></textarea>
                                    {!! $errors->first('message', '<span class="text-danger">:message</span>') !!}
                                </div>
                                <div class="form-group">
                                    <div class="text-center">
                                        <button class="btn btn-success">Send</button>
                                    </div>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="text-align: center; background-color: lightsteelblue; padding-top: 20px">
                    <h3><i class="fa fa-map-marker"></i>&nbsp; Young Minds Tower, Chowk Prayag <br> Shanti Nagar, Prayag Marg, <br> Kathmandu 44600</h3>
                    <h3><i class="fa fa-phone"></i>&nbsp; 01-661234</h3>
                    <h3><i class="fa fa-envelope-open"></i>&nbsp; example@gmail.com</h3>
                </div>
            </div>
    </div>


@endsection