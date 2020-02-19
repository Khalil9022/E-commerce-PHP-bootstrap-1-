function createSlug(){
    let title = $('#title').val(); //Ambil value dari input ber-id title 
    $('#slug').val(string_to_slug(title)); //Mengubah title menjadi slug menggunakan fungsi, lalu disimpan di value yang memiliki id slug 
}
function string_to_slug (str) { //src: https://gist.github.com/codeguy/6684588
    str = str.replace(/^\s+|\s+$/g, ''); // trim
    str = str.toLowerCase();
  
    // remove accents, swap ñ for n, etc
    var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
    var to   = "aaaaeeeeiiiioooouuuunc------";
    for (var i=0, l=from.length ; i<l ; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }

    str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
        .replace(/\s+/g, '-') // collapse whitespace and replace by -
        .replace(/-+/g, '-'); // collapse dashes

    return str;
}