 @if ($errors->any())
     <ul>
         @foreach ($errors->all() as $error)
             <li class="alert-danger font-italic">{{ $error }}</li>
         @endforeach
     </ul>
 @endif

 {{-- Table start From here --}}
 <div class="shadow card border-dark">
     <div class="card-header bg-info success text-light text-center">
         <h4>{{ $head }}</h4>
     </div>
     <div class="table-responsive container mt-2 mb-2" style="font-size:15px">
         {{ $slot }}
     </div>
 </div>
