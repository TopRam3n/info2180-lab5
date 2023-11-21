window.addEventListener("load", function (e){
    var lookupBtn = document.querySelector("button");
    var citiesBtn = document.getElementById("city");
    const result = document.querySelector("#result");
    const input = document.querySelector("input");

    lookupBtn.addEventListener('click', function (e) {
        e.preventDefault();
        
        // const result = document.querySelector("#result");
        // const input = document.querySelector("input");

        //let country = input.value.trim();
        let url = 'world.php?country=' + input + '&lookup=countries';

        fetch(url)
            .then(response => {
                return response.text();
            })

            .then(data => {
                result.innerHTML = data;
                console.log(data);
            })

    });

    citiesBtn.addEventListener('click', function (e) {
        e.preventDefault();

        let url = 'world.php?country=' + input + '&lookup=cities';

        fetch(url)
            .then(response => {
                return response.text();
            })

            .then(data => {
                result.innerHTML = data;
                console.log(data);
            })

    });
})