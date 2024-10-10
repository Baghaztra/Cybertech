@extends('frontend.layouts.main')

@section('content')
<div style="background-color: black; height: 54px; z-index: -1;" class="navbar navbar-expand-md navbar-dark fixed-top"></div>
<div style="height: 100px"></div>
<div class="container" style="height: 200px">
    <center class="mt-5">
        <h1>Jawaban anda sudah diterima</h1>
    </center>
    <marquee id="marquee-text">Makasih bang</marquee>
    <a href="/event/{{ $event_id }}">Kembali</a>
</div>
<script>
    // biar jedag jedug
    const colors = ['#ff0000', '#00ff00', '#0000ff', '#ffff00', '#ff00ff', '#00ffff'];
    const marqueeText = document.getElementById('marquee-text');
    function changeColor() {
        const randomColor = colors[Math.floor(Math.random() * colors.length)];
        marqueeText.style.color = randomColor;
    }
    setInterval(changeColor, 500);
</script>
@endsection
