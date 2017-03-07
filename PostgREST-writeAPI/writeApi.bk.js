/**
 * Produce a Nginx config file from inputs. Usage:
 *   node writeApi.js --tpl=lix --api=petstore-minimal
 *
 * @param tpl string: the file name at nginx-tpl folder, without extension.
 * @param api string: the file name at api-spec folder, without extension.
 * @return STDOUT with the new Nginx config script.
 *
 * @see https://github.com/ppKrauss
 */

var handlebars = require('handlebars');
var fs = require('fs');
var arg = require('minimist')(process.argv.slice(2));
var path = process.cwd();


if (arg['tpl']==undefined || arg['api']==undefined) {
  console.log("\n ERROR-2, see folders 'nginx-tpl' and 'api-spec'. Use options \n\t--tpl=filenameAtTpl \n\t--api=filenameAtApi\n");
  process.exit(2);
}

var apiSpec = require(path+'/api-spec/'+arg['api']+'.json');
var templateSrc = fs.readFileSync(path + "/nginx-tpl/"+arg['tpl']+".mustache").toString();


// here need to use scape for each endpoint as regular expression in the script. 
//     return value.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g, "\\$&");



var template = handlebars.compile(templateSrc); // see http://stackoverflow.com/q/9058774/287948
var out = template(apiSpec);


//var out = mustache.to_html(template, apiSpec);

console.log(out);
