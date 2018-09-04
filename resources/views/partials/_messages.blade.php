@if (Session::has('success'))

    <div class="alert alert-success alert-dismissable" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success:</strong> {!! Session::get('success') !!}
    </div>

@endif

@if (Session::has('info'))

    <div class="alert alert-info alert-dismissable" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Note: </strong> {!! Session::get('info') !!}
    </div>

@endif

@if (Session::has('warning'))

    <div class="alert alert-warning alert-dismissable" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Note: </strong> {!! Session::get('warning') !!}
    </div>

@endif

@if (count($errors) > 0)

    <div class="alert alert-danger alert-dismissable" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        
        <strong>Errors:</strong>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif
<div id="message">
    
</div>