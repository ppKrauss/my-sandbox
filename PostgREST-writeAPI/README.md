We use the best, Nginx and PostgREST, to translate your OpenAPI specification into a back-end system... The project offers the main piece of the implementation, the Nginx script that acts as a MVC-controller for PostgREST and your system.

## Motivations

PostgREST endpoints are ready-for-use, but, sometimes you can't reuse directally its "complex URL" endpoints, or need compliance with system requirements -- já expressos antes em uma OpenAPI specification.
 
This project was started to simplify this PostgREST use case: to obey the OpenAPI specification of your project.

### Market motivations

PostgreSQL is not an "agile tool"?  Now it is! 

Is not perfect yet, but in some niche PostgreSQL experts now can compete with Spring-boot, Django, CakePHP, etc. agile frameworks, in the back-end design and prototipation. You can generate a ready-for-use production version system with PostgREST.

## OpenAPI addictions to specify your system


Your application can use a fullstack PostgREST, but  
Two new fields are included to 

## Methodology

As the project is version 0.1, have good methodology but not an automatic procedure (nossa meta é ser um Spring-roo da vida).

1. Check what templete you need (or colabore creating a new one!).

2. Add the fields xx and yy in your suagger.json, in all endpoints that you need non-default PostgREST behaviour.

3. run `nodejs writeapi.js -t template -s specification.json -o script.conf` .. it will generate the Nginx's script. 
 
4. do next steps as usual Nginx implementation
