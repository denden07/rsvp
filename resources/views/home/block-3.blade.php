<div class="block-3-container">
<div class="wrapper wrapper-border" style="position: relative;">
<img src="{{ asset('images/crown-right@2x.png') }}" alt=""  style="    position: absolute;
    width: 139px;
    right: 0;">
<div class="spacer-32"></div>
    <div class="spacer-56"></div>
    <div class="" style="position: relative">

    <h2 class="birthday-queen">Our Birthday Queen</h2>
    </div>
    <div class="spacer-32"></div>
<section id="gallery" class="gallery">
  <div>
    <article>
    <img src="{{ asset('images/gallery/1_50.webp') }}" alt="" >
      <div><span class="material-symbols-outlined material-fill-1">favorite</span>12 Likes</div>
    </article>
    <article>
    <img src="{{ asset('images/gallery/2_50.webp') }}" alt="" >
      <div><span class="material-symbols-outlined material-fill-1">favorite</span>23 Likes</div>
    </article>
    <article>
    <img src="{{ asset('images/gallery/3_50.webp') }}" alt="" >
      <div><span class="material-symbols-outlined material-fill-1">favorite</span>6 Likes</div>
    </article>

  </div>
  <div>
    <article>
    <img src="{{ asset('images/gallery/4_50.webp') }}" alt="" >
      <div><span class="material-symbols-outlined material-fill-1">favorite</span>22 Likes</div>
    </article>
    <article>
    <img src="{{ asset('images/gallery/5_50.webp') }}" alt="" >
      <div><span class="material-symbols-outlined material-fill-1">favorite</span>18 Likes</div>
    </article>
    <article>
    <img src="{{ asset('images/gallery/6_50.webp') }}" alt="" >
      <div><span class="material-symbols-outlined material-fill-1">favorite</span>145 Likes</div>
    </article>

  </div>
  <div>
    <article>
    <img src="{{ asset('images/gallery/7_50.webp') }}" alt="" >
      <div><span class="material-symbols-outlined material-fill-1">favorite</span>145 Likes</div>
    </article>
    <article>
    <img src="{{ asset('images/gallery/8_50.webp') }}" alt="" >
      <div><span class="material-symbols-outlined material-fill-1">favorite</span>98 Likes</div>
    </article>
    <article>
    <img src="{{ asset('images/gallery/9_50.webp') }}" alt="" >
      <div><span class="material-symbols-outlined material-fill-1">favorite</span>37 Likes</div>
    </article>

  </div>

</section>
<div class="spacer-32"></div>
    <div class="spacer-56"></div>
</div>
</div>

<style>
.wrapper-border {
    background: linear-gradient(138deg, rgba(255,255,255,1) 0%, rgba(229,173,173,1) 39%);
    border-radius: 16px 201px 15px 150px;
-webkit-border-radius: 16px 201px 15px 150px;
-moz-border-radius: 16px 201px 15px 150px;
}

.gallery {
    --_size: 300px;
    --_gap: .5rem;
    --_grid-cols: var(--_size) var(--_size) var(--_size);
    --_grid-rows: var(--_size) var(--_size) var(--_size);
    --_size-hover: calc(var(--_size) * 2);
    --_size-not-hover: calc(var(--_size) / 2);
     --_speed: 500ms;

    width: 100%;
    display: grid;
    gap: var(--_gap);
    justify-content: center;
}

@media (min-width:720px) {
    .gallery {
        grid-template-columns: var(--_grid-cols);
        transition: var(--_speed) ease-in-out;
    }
}

.gallery>div {
    height: fit-content;
    display: grid;
    grid-template-rows: var(--_grid-rows);
    gap: var(--_gap);
    transition: var(--_speed) ease-in-out;
}

.gallery article {
    position: relative;
    overflow: hidden;
}

.gallery img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: sepia(75%);
    transition: filter var(--_speed);
}
.gallery img:hover{
  filter: sepia(0);
}

/* likes - not really relevant */
.gallery>div>article>div {
    position: absolute;
    bottom: 0;
    left: 0;
    background: #00000070;
    font-size: 0.65rem;
    color: white;
    display: flex;
    align-items: center;
    gap: .25rem;
    padding: .15rem 0.5rem;
    translate: 0 20px;
    transition: translate var(--_speed) ease-in-out 300ms;

}
.gallery>div>article>div>span {
    font-size: 0.7rem;
    color: red;
}
.gallery>div>article:hover div {
    translate: 0;
}


/* hover - parent columns */
.gallery:has(>div:nth-child(1):hover) {
    --_grid-cols: var(--_size-hover) var(--_size-not-hover) var(--_size-not-hover);
}

.gallery:has(>div:nth-child(2):hover) {
    --_grid-cols: var(--_size-not-hover) var(--_size-hover) var(--_size-not-hover);
}

.gallery:has(>div:nth-child(3):hover) {
    --_grid-cols: var(--_size-not-hover) var(--_size-not-hover) var(--_size-hover);
}


/* hover - child rows */
.gallery>div:has(>article:nth-child(1):hover) {
    --_grid-rows: var(--_size-hover) var(--_size-not-hover) var(--_size-not-hover);
}

.gallery>div:has(>article:nth-child(2):hover) {
    --_grid-rows: var(--_size-not-hover) var(--_size-hover) var(--_size-not-hover);
}

.gallery>div:has(>article:nth-child(3):hover) {
    --_grid-rows: var(--_size-not-hover) var(--_size-not-hover) var(--_size-hover);
}


/* hearts */
.material-fill-1 {
    font-variation-settings:
        'FILL'1,
        'wght'400,
        'GRAD'0,
        'opsz'48
}


</style>
