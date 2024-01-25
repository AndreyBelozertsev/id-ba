import {swiper4} from './slider';

if(document.querySelector('.ideas-list__paginate')){

    var target = document.getElementById('ideas-list__block');
    
    // создаем новый экземпляр наблюдателя
    var observer = new MutationObserver(function(mutations) {
    mutations.forEach(function(mutation) {
        paginate();
        swiper4();
    });    
    });
    
    
    // создаем конфигурации для наблюдателя
    var config = { attributes: true, childList: true, characterData: true };
    
    // запускаем механизм наблюдения
    observer.observe(target,  config);

    paginate();    

}

function paginate(){

    let paginateBlock = document.querySelector('.ideas-list__paginate');
    let paginateButtons = paginateBlock.querySelectorAll('.pg');



    paginateButtons.forEach(function(elem) {
        elem.addEventListener("click", async function(event) {
            event.preventDefault();
            history.pushState(null , null, event.target.getAttribute('href'));
            let res = await axios.get(event.target.getAttribute('href'));
            document.getElementById('ideas-list__block').innerHTML = await res.data;

        });
    });
}