javascript:(function() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if ( this.readyState !== 4 ) {
            return;
        }

        if ( this.status !== 200 ) {
            return;
        }

        this._post( this.responseText );
    };
    xhr.open( 'GET', location );
    xhr._pair = function( name, value ) {
        return {
            name: name,
            value: value
        };
    };
    xhr._post = function( fragment ) {
        var documentFragment,
            fieldset,
            form,
            id = 'mvs',
            iframe,
            input,
            pair,
            pairIndex,
            pairs;

        pairs = [
            xhr._pair( 'doctype', 'Inline' ),
            xhr._pair( 'fragment', fragment ),
            xhr._pair( 'group', '0' ),
            xhr._pair( 'prefill', '0' ),
            xhr._pair( 'prefill_doctype', 'xhtml10' ),
            xhr._pair( 'verbose', '1' )
        ];

        documentFragment = document.createDocumentFragment();

        iframe = document.createElement( 'iframe' );
        iframe.onload = function() {
            // closure: form
            form.parentNode.removeChild( form );
        };
        iframe.setAttribute( 'name', id );
        iframe.setAttribute( 'id', id );
        iframe.style.width = '100%';
        iframe.style.height = '20em';
        documentFragment.appendChild( iframe );

        form = document.createElement( 'form' );
        form.setAttribute( 'action', 'http://validator.w3.org/check' );
        form.setAttribute( 'method', 'post' );
        form.setAttribute( 'target', id );
        form.style.display = 'none';
        documentFragment.appendChild( form );

        fieldset = document.createElement( 'fieldset' );
        form.appendChild( fieldset );

        for (
            pairIndex = 0;
            pairIndex < pairs.length;
            pairIndex++
        ) {
            pair = pairs[ pairIndex ];
            input = document.createElement( 'input' );
            input.setAttribute( 'name', pair.name );
            input.setAttribute( 'value', pair.value );
            fieldset.appendChild( input );
        }

        document.body.insertBefore(
            documentFragment,
            document.body.firstChild
        );

        form.submit();
    };
    xhr.send();
})();
