import torch

vector = torch.tensor([7,7])
print(vector.ndim)
print(vector.shape)
matrix = torch.tensor([[2,3],[4,5]])
print(matrix.ndim)
print(matrix.shape)


matrix = torch.tensor([[[2,3],[4,5]],[[2,3],[4,5]]])
print(matrix.ndim) # Returns total number of dimensions in the matrix
print(matrix.shape) # Returns the dimension of individual rows till we reach column. Abive example has 2 rows and inside each row there are 2 more rows with 2 columns hence shape is[2,2,2] 

random_tensor = torch.rand(size=(3,4))


"""
C:\Users\Arun>python
Python 3.11.0 (main, Oct 24 2022, 18:26:48) [MSC v.1933 64 bit (AMD64)] on win32
Type "help", "copyright", "credits" or "license" for more information.
>>> import torch
>>>
>>> vector = torch.tensor([7,7])
>>> print(vector.ndim)
1
>>> print(vector.shape)
torch.Size([2])
>>> matrix = torch.tensor([[2,3],[4,5]])
>>> print(matrix.ndim)
2
>>> print(matrix.shape)
torch.Size([2, 2])
>>>
>>>
>>> matrix = torch.tensor([[[2,3],[4,5]],[[2,3],[4,5]]])
>>> print(matrix.ndim) # Returns total number of dimensions in the matrix
3
>>> print(matrix.shape) # Returns the dimension of individual rows till we reach column. Abive example has 2 rows and inside each row there are 2 more rows with 2 columns hence shape is[2,2,2]
torch.Size([2, 2, 2])
>>>
>>> random_tensor = torch.rand(size=(3,4))
>>>
>>>
>>> print(random_tensor)
tensor([[0.6274, 0.4168, 0.4763, 0.6952],
        [0.5601, 0.8779, 0.5092, 0.2908],
        [0.0218, 0.8516, 0.4984, 0.3214]])

>>> zeroes = torch.zeros(3,4)
>>> zeroes
tensor([[0., 0., 0., 0.],
        [0., 0., 0., 0.],
        [0., 0., 0., 0.]])
>>> ones = torch.ones(5,6)
>>> ones
tensor([[1., 1., 1., 1., 1., 1.],
        [1., 1., 1., 1., 1., 1.],
        [1., 1., 1., 1., 1., 1.],
        [1., 1., 1., 1., 1., 1.],
        [1., 1., 1., 1., 1., 1.]])
>>> new_tensor = ones.tensor_like(input=ones)
Traceback (most recent call last):
  File "<stdin>", line 1, in <module>
AttributeError: 'Tensor' object has no attribute 'tensor_like'. Did you mean: 'tensor_split'?
>>> new_tensor = torch.zeros_like(input=ones)
>>> new_tensor
tensor([[0., 0., 0., 0., 0., 0.],
        [0., 0., 0., 0., 0., 0.],
        [0., 0., 0., 0., 0., 0.],
        [0., 0., 0., 0., 0., 0.],
        [0., 0., 0., 0., 0., 0.]])
>>> range = torch.arange(1,5,3)
>>> range
tensor([1, 4])
>>> range = torch.arange(1,100,3)
>>> range
tensor([ 1,  4,  7, 10, 13, 16, 19, 22, 25, 28, 31, 34, 37, 40, 43, 46, 49, 52,
        55, 58, 61, 64, 67, 70, 73, 76, 79, 82, 85, 88, 91, 94, 97])


>
>>> dtype_check =  torch.arange(1,100,dtype=None,device=None,requires_grad= False)
>>> dtype_check
tensor([ 1,  2,  3,  4,  5,  6,  7,  8,  9, 10, 11, 12, 13, 14, 15, 16, 17, 18,
        19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36,
        37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54,
        55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72,
        73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90,
        91, 92, 93, 94, 95, 96, 97, 98, 99])
>>> # Device tells us hat device are we running the tensors on. Eg: if one temsor has device as GPU while the other has device CPU we will get error same for dtype

"""