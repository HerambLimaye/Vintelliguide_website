var x=0;
function headerchange()
{
if(x==0)
{
if((window.innerWidth<990))
{
document.getElementsByTagName("header")[0].style.height="325px";
}
x=1;
}
else
{
document.getElementsByTagName("header")[0].style.height="15vh";
x=0;
}
}