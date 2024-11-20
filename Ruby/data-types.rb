# Dynamically typed language.
# All data types are objects.
# Primitive types are immutable, complex types are mutable.

# Strings in Ruby are mutable
a = 'HI' # Points to address 1
b = a # Mutable, points to address 1 (same as a)
a.downcase! # Bang method is applied to the underlying object, also changing b
puts b # Outputs 'hi'

a = 'HI'
b = a # Points to original address
a = 'xxx' # Creates new value, and therefore new address
puts b # Outputs 'HI'