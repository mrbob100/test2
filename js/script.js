

function fun1() {
    let sel=document.querySelector('#mySelect').selectedIndex;
    let options=document.querySelector('#mySelect').options,
        out=document.querySelector('.change');
   // let data=JSON.stringify( { 'data': options[sel].value});
    //  alert('Выбрана опция '+options[sel].text+' '+options[sel].value);
  let xhr = new XMLHttpRequest();
 let data= 'data='+options[sel].value;


      //   alert('Выбрана опция  '+ data);

    xhr.open('POST', '?option=change' , true);


   xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=utf-8');

 //  xhr.responseType = 'json';
 //   xhr.setRequestHeader('Content-Type', 'application/json; charset=utf-8');
    xhr.onload = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);
            console.log('response',xhr.response);
            let  myobj = xhr.responseText;
            out.innerHTML= myobj;
        }
        else if(xhr.status != 200) {

            alert( xhr.status + ': ' + xhr.statusText+' это лажа' ); // пример вывода: 404: Not Found
        }
    };

    xhr.send(data);



}

