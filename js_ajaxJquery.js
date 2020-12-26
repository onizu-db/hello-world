    // ajax submission: (formSessionID not getting updated, hence doesn't submit after the 1st time)
    
    $.each(js_qtyGroupList, function() {
        var qtyGroupID = '';
        qtyGroupID = this;
        $(`#qtySubGroupForm_${qtyGroupID}`).submit(function(e) {
            e.preventDefault();
            var inputFields = $(this).find('input');
            var formData = $(this).serialize();
            inputFields.prop('disabled', true);
            formRequest = $.post( "index.php", formData);
            formRequest.done(function(response, resultStatus, JqXHR) {
                var xdebugVarDump = $(response).filter('pre.xdebug-var-dump');
                $('#jsInfo').empty();
                $.each(xdebugVarDump, function() {
                    console.log(this);
                    $('#jsInfo').append(this);
                });
                console.log(resultStatus, JqXHR); 
                var qtySubGroupList = `#qtySubGroupList_${qtyGroupID}`;
                var updatedList = $(JqXHR.responseText).find(qtySubGroupList)[0];
                //console.log(updatedList);
                $(qtySubGroupList).replaceWith(updatedList);
            });
            formRequest.fail(function(JqXHR, resultStatus, errorMsg) {
                console.error("Form Submit Error: "+resultStatus, errorMsg);
            });
            formRequest.always(function(){
                inputFields.prop('disabled', false);
            });
            $(this).trigger('reset');
        });
    });
    
