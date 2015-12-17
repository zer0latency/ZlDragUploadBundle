# ZlDragUploadBundle
## Symfony2 Drag&Drop Uploading Form Exstension Bundle
### Install
To use this bundle you need to add some configuration to `composer.json`, as follows:

    {
        "repositories": [
            ...
            {
                "type": "vcs",
                "url": "https://github.com/zer0latency/ZlDragUploadBundle"
            },
            ...
        ],
        "require": {
            ...
            "zer0latency/zl-dragupload-bundle": "dev-master",
            ...
        }
    }
    
Next, you must add routings to `app/config/routing.yml`:

    ...
    zl_dragupload_bundle:
        resource: "@ZlDragUploadBundle/Controller/"
        type:     annotation
        prefix:   /
        
And add the form template file to `app/config/config.yml`:
```
...
twig:
    form:
        resources:
            - 'ZlDragUploadBundle:Form:zl_dragupload_widget.html.twig'
```
