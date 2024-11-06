# # Integers
# num = 7
# print(type(num))

# # Floats
# num2 = 0.7
# print(type(num2))

# # Complex numbers
# num3 = complex(10, 20)
# print(num3) # prints (10+20j)
# print(type(num3))

# # Booleans
# print(1 == 1)

# # Strings
# word = "word"
# print(len(word))
# print(word[1])
# print(word[-1])
# print(word[0:2]) # doesn't include the 2nd index, start and end indices are optional
# print(word[0:4:2]) # defining steps
# print(word[5:0:-2])
# print(word[::-1])
# print('w' in word)
# print(word.find("o")) # returns index 1
# print(word.replace("o", "a"))
# print(word.upper()) # also with lower
# str_list = ["hello", "world"]
# print(" ".join(str_list))
# print(f"This is the word: {word}")

# # Strings are immutable
# # word[0] = "h" will cause an error
# # When a variable's string is "changed", it simply points to a new memory location
# print(id(word))
# word = "word2"
# print(id(word))

# # Operators
# # Arthimetic () * + - / // % **
# # Comparative < > = ! is
# # Assignment = += -= &= <<= >>= etc
# # Logical and or not
# # Bitwise & | ^ ~ << >>

# # Lists (similar operations to strings)
# list1 = [1, '3', 5]

# # Conditionals
# price = 100
# if price >= 300:
#     price *= 0.7
# elif 200 <= price < 300:
#     price *= 0.8
# elif 100 <= price < 200:
#     price *= 0.9
# elif price < 100:
#     price *= 0.95
# else:
#     print("no discount")

# # Functions
# # Changes to immutable data will not be reflected outside the function's scope, but changes to mutable will.

# # Lambdas - particularly useful when passing functions are arguments
# triple = lambda num : num * 3
# my_func = lambda num : "High" if num > 50 else "Low"
# print(triple(10))
# print(my_func(60))

# # Mapping
# num_list = [1, 2, 3, 4]
# double_list = map(lambda num : num * 2, num_list) # creates a new list
# print(type(double_list))
# print(double_list)
# print(list(double_list))

# # Filtering
# even_list = filter(lambda num : num % 2 == 0, num_list)
# print(even_list)
# print(type(even_list))
# print(list(even_list))

# # Recursion - good for reducing runtime, solving graph or tree related problems or in search algorithms
# # Recursion uses stacks, stacking up each function call until the base case is reached. The function calls
# # are then executed on a first in last out basis.
# def factorial(n):
#     if n == 1 or n == 0:
#         return 1
#     if n < 0:
#         return -1
#     return n * factorial(n - 1)

# # For loops
# def check_sum(num_list):
#     for i in range(len(num_list) - 1):
#         for j in range(len(num_list) - 1):
#             if num_list[i] + num_list[j + 1] == 0:
#                 return True
#     return False

# # While loops
# def fib(n):
#     first = 0
#     second = 1

#     if n < 1:
#         return -1

#     if n == 1:
#         return first

#     if n == 2:
#         return second

#     count = 3
#     while count <= n:
#         fib_n = first + second
#         first = second
#         second = fib_n
#         count += 1
#     return fib_n

def 