
const api_key = "4f10050d-6940-42fd-86ff-8bd8ed6b0306"
const url = "https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest?start=1&limit=5"



// $.ajax({
//     url,
//     type:"get",
//     headers:{"X-CMC_PRO_API_KEY":api_key},
//     success:function(data){
//         console.log(data)
//     }
// })

$.ajax({
    url: url,
    headers:{"X-CMC_PRO_API_KEY":api_key},
    success: (data)=>{
        console.log("oko:",data)
    }
  });




// fetch(url, { mode: 'no-cors' })
//     .then(response => {
//         // Log the response status code and response text
//         console.log('Response status:', response.status);
//         console.log('Response text:', response.statusText);

//         if (!response.ok) {
//             throw new Error('Network response was not ok');
//         }
//         return response.json();
//     })
