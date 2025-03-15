
<button type="{{ $type ?? 'submit'}}" class="btn" @isset($id) id="{{ $id }}" @endisset
style="background-color: #7b48cd; color: white; width: 100px; float: right;">{{ $label ?? 'Next' }} &nbsp;<i class="fa-solid fa-arrow-right"></i></button>