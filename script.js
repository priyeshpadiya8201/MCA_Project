function loadinganimation(){
gsap.Form(".main h1",{
    y:100,
    opacity:0,
    delay:0.5,
    duration:0.5,
    stagger:0.2
})
}
const scroll = new LocomotiveScroll({
    el: document.querySelector('h1'),
    smooth: true
});