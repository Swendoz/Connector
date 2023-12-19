const statu = document.querySelector('.status');
if (statu)
{
    setTimeout(() =>
    {
        statu.remove();
        const url = window.location.href;
        const newUrl = url.split('?')[ 0 ];
        console.log(newUrl);
        window.history.pushState({}, '', newUrl);
    }, 3000);
}