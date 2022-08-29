
form = document.getElementById('form-delivery');
function addressDelivery(event) {
    event.preventDefault();
    const city = this.city.value;
    const state = this.state.value;
    const URL = 'http://127.0.0.1:8090/driver/delivery/address';

   todo = {"city":city,"state":state}

    axios.post(URL,todo,{
        headers:{
            'x-access-token':'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MSwiZXhwIjoxNjYxNDcxMjg0fQ.myMZkrD7_RkFGDz3cGUsm3hZ4DnKRbdUvIKE8KZCnQ0'
        }
    }).then(function (response) {
        console.log(response.data);
        const div = document.getElementById('address-delivery');
        exibir(response.data, div);
    });

}

function exibir(data, element) {
    const size = data.length;
    for(let i = 0;i<size;i++){
    element.innerHTML = data[i]['city'];
    }

    
    
    
}
form.addEventListener('submit', addressDelivery);