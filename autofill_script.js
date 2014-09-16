/*
 * This is a JavaScript Scratchpad.
 *
 * Enter some JavaScript, then Right Click or choose from the Execute Menu:
 * 1. Run to evaluate the selected text (Ctrl+r),
 * 2. Inspect to bring up an Object Inspector on the result (Ctrl+i), or,
 * 3. Display to insert the result in a comment after the selection. (Ctrl+l)
 */

(function( window ) {
  "use strict";
  var document = window.document,
      fieldValueMap = {
            "title"       : "Mr."
          , "name"        : "Johnny Depp"
          , "fullname"    : "Johnny Depp"
          , "firstname"   : "Johnny"
          , "lastname"    : "Depp"
          , "sex"         : "Male"
          , "fathersname" : "Johnny Depp Sr."
          , "mothersname" : "Barbara Depp"
          , "dob"         : "1987-07-19"
          , "age"         : "27"
          , "religion"    : "Pirate"
          , "maritalstatus": "Unmarried"
          , "handicapped" : "No"
          , "community"   : "Pirate Community"
          , "minority"    : "Yes"
          , "feeremission": "No"
          , "email"       : "johnny.depp@pirates.com"
          , "username"    : "JackSparrow"
          , "password"    : "blackpearl"
          , "confirmation": "blackpearl"
          , "position"    : "Captain"
          , "zipcode"     : "110011"
          , "country"     : "India"
          , "state"       : "Uttar Pradesh"
          , "city"        : "Totuga"
          , "address"     : "3153 auburn ave"
          , "phone"       : "(135)-773-2494"
          , "cell"        : "(327)-710-3077"
          , "SSN"         : "966-49-5276"
          , "company"     : "Night Watch"
          , "nationality" : "Indian"
          , "comment"     : "This is a test data. Please, ignore it."
          , "jobtitle"    : "Crow"
          , "experiance"  : "Veteran (5+)"
          , "site_link"   : "jon.winterfell.we"
          , "how"         : "other (Please specify)"
          , "specified"   : "This is a test data. Please, ignore it."
          , "publication" : "Westeros Daily"
      };

    Object.keys( fieldValueMap ).forEach(function( name ){

        var input = document.querySelector( "form input[name='" + name + "']" )
                        || document.querySelector( "form select[name='" + name + "']" )
            || document.querySelector( "form textarea[name='" + name + "']" );

        input && input.type !== "hidden" && ( input.value = fieldValueMap[ name ] );
    });

})( window );