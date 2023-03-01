@extends('navigation.homepage')

@section('belowNav')
<div class="offerH1">
    <h1>Here are the Covers we created for you</h1>
</div>
<div class="Covers">
    <div class="Card">
        <div class="ribbon"><span class="ribbon__content">$499</span></div>
        <div>
            <i class="fa-solid fa-bomb"></i>
            <h3>Base</h3>
        </div>
        <ul>
            <li>Lorem ipsum dolor sit, amet consectetur adipisicing.</li>
            <li>Lorem ipsum dolor sit, amet consectetur adipisicing.</li>
            <li>Lorem ipsum dolor sit, amet consectetur adipisicing.</li>
        </ul>
        <a href="">select this cover</a>
    </div>
    <div class="Card">
        <div class="ribbon"><span class="ribbon__content">$799</span></div>
        <div>
        <i class="fa-solid fa-star"></i>
            <h3>Pro</h3>
        </div>
        <ul>
            <li>Lorem ipsum dolor sit, amet consectetur adipisicing.</li>
            <li>Lorem ipsum dolor sit, amet consectetur adipisicing.</li>
            <li>Lorem ipsum dolor sit, amet consectetur adipisicing.</li>
        </ul>
        <a href="">select this cover</a>
    </div>
    <div class="Card">
        <div class="ribbon"><span class="ribbon__content">$1299</span></div>
        <div>
            <i class="fa-solid fa-diamond"></i>
            <h3>Elite</h3>
        </div>
        <ul>
            <li>Lorem ipsum dolor sit, amet consectetur adipisicing.</li>
            <li>Lorem ipsum dolor sit, amet consectetur adipisicing.</li>
            <li>Lorem ipsum dolor sit, amet consectetur adipisicing.</li>
        </ul>
        <a href="">select this cover</a>
    </div>
</div>
@endsection