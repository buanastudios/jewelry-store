// numeral.js locale configuration
// locale : indonesian Indonesia (id)
// author : Arti Hikmatullah Perbawana Sakti Buana : http://arthipesa.com

(function (global, factory) {
    if (typeof define === 'function' && define.amd) {
        define(['../numeral'], factory);
    } else if (typeof module === 'object' && module.exports) {
        factory(require('../numeral'));
    } else {
        factory(global.numeral);
    }
}(this, function (numeral) {
    numeral.register('locale', 'id', {
        delimiters: {
            thousands: '.',
            decimal: ','
        },
        abbreviations: {
            thousand: 'ribu',
            million: 'juta',
            billion: 'milyar',
            trillion: 'triliyun'
        },
        ordinal: function (number) {
            return 'º';
        },
        currency: {
            symbol: '&#x52'
        }
    });
}));
