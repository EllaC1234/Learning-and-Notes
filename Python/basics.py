# # Lambdas - particularly useful when passing functions are arguments
triple = lambda num : num * 3
my_func = lambda num : "High" if num > 50 else "Low"
print(triple(10))
print(my_func(60))

# # Mapping
num_list = [1, 2, 3, 4]
double_list = map(lambda num : num * 2, num_list) # creates a new list
print(type(double_list))
print(double_list)
print(list(double_list))

# # Filtering
even_list = filter(lambda num : num % 2 == 0, num_list)
print(even_list)
print(type(even_list))
print(list(even_list))

# # Recursion - good for reducing runtime, solving graph or tree related problems or in search algorithms
# # Recursion uses stacks, stacking up each function call until the base case is reached. The function calls
# # are then executed on a first in last out basis.
def factorial(n):
    if n == 1 or n == 0:
        return 1
    if n < 0:
        return -1
    return n * factorial(n - 1)