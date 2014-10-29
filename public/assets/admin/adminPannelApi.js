
var apminPannelApi = function () {
    return {
        lastUpdateTimestamp : 0,
        formsDB : TAFFY([]),
        init : function (){
            this.loadFromsDB(this.lastUpdateTimestamp);
        },
        loadFromsDB: function(lastUpdateTimestamp) {
            jQuery.ajax({
                url: 'api/forms/list/' + lastUpdateTimestamp,
                type: 'GET',
                dataType: 'json',
                async: false
            }).done(function(data) {
                console.log(data);
                this.authorsDB = TAFFY(data.aaData);
                lastUpdateTimestamp = Math.ceil(Date.now() / 1000);
            });
        }
    };
}();


