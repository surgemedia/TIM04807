# Reusable Field Group Field for ACF Pro
Version 0.3.2 (see changelog.txt)

## How it works
Field groups are rebuilt using local field groups that override existing field groups.

## Why only ACF5
acf_local is not supported in ACF4

### Installation
Download and unzip to /plugins/acf-reusable-field-group-field

### Using
Using this add on in the admin should be pretty self explanatory. When creating a field group you add a 
reusable field group field and select the field group you want to include.

Care should be taken when 
selecting field groups to reuse as it is possible to create an infinite loop if you create a
self-referencing loop of field groups. I have put in a test to attempt to catch these infinite loops
and abort the rebuilding process and I've tested it as well as I could, but you never know.

Using the fields from the field groups create by this add on will be a little more difficult. All of 
the standard ACF functions should work, but the field names and field keys of the fields will be altered.
Their is nothing in the admin that will tell you what these new field names and field keys are so you'll
need to figure that out on your own. You can also look in the generated JSON for the new field group by
looking in the `acf-json` folder in this plugin.

You can turn off the renaming of field names and feild keys, however, I would not suggest this. ACF requires
unique field names and unique field keys to function properly. Turning of the renaming may have unintented
side effects. There may be very limited cases where turning it off will work, but I have not tested this.

The following is a basic outline of how the field names and field keys are renamed.

#### Field Name Prefixing

Let's say that you create a field in a field group that you want to reuse and you name this field `text_field`.
In another group you create a resuable field group field and you name this field `reusable_group`. The new name
of the text field, and the name you will need to use in all ACF functions will be `reusable_group_text_field`.
The name of the resusable field group field will prefix each of the fields in the resused field group..

#### Field Key Prefixing

Lets assume that you have the same conditions as described above and that the field key for the `text_field`
is `field_56351ab9271b8` and the field key for `reusable_group` is `field_56351aa7271b7`. The new field 
key will be `field_56351aa7271b7_56351ab9271b8`. ACF field keys must begin with `field_`. The second 
section of the new key is the unique ID from the reusable field group key with an added underscore 
`56351aa7271b7_` and the last section of the new key is the unique ID from the field in the group 
that is being reused `56351ab9271b8`.

#### Compound Field Names and Keys
It is posssible to reuse a field group that included resusable field group fields. In this case the field names
and keys will be prefixed again, for example `resuable_field_reusable_field_text_field` and
`field_56351aa7271b7_56351ab9271b8_56351ac768a9`. Care should be taken with compound resusable field groups so
that you do not exceed any limitations of field names that may be imposed by the database, for example option_name in the options table.

#### When Can You Turn Off Field Name/Key Prefixing?
Field name and field key prefixing is not always needed. It really depends on where and how you'll be reusing field groups. See [the comment I made on this issue](https://github.com/Hube2/acf-reusable-field-group-field/issues/15#issuecomment-180020166). Understanding where and when it can be turned off requires an understanding of how ACF stores data for custom fields.

### Local JSON
Like ACF, this plugin uses Local JSON to improve performance. The plugin includes it's own acf-json folder. To take advantage of this feature this folder must be writeable by PHP.

### Bugs, Problems, Questions?
[Please let me know in if you have any problems with this plugin working.](https://github.com/Hube2/acf-reusable-field-group-field/issues)
If you have questions about how to do something, please do not email me to ask them.
[Please post them in issues instead](https://github.com/Hube2/acf-reusable-field-group-field/issues), 
I will handle support here on GitHub.

### Donations
If you find my work useful and you have a desire to send me money, which will give me an incentive to continue
offering and maintaining the plugins I've made public in my many repositories, I'm not going to turn it down
and whatever you feel my work is worth will be greatly appreciated. You can send money through paypal to
hube02[AT]earthlink[dot]net. 
