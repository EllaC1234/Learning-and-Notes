
# Block
# Blocks are self-contained sections of code that are defined by {} or do...end
# Always associated with a method call and exist only within that scope. An implict return
[1, 2, 3].each do |number|
    puts number * 2
end